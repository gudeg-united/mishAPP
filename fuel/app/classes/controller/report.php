<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2014 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Report extends Controller_Base
{

    /**
     * The basic welcome message
     *
     * @access  public
     * @return  Response
     */
    public function action_index()
    {
        Response::redirect('/');
    }

    /**
     * Report disaster as a crowd source
     * @return void
     */
    public function action_disaster()
    {
        $get = Input::get(array('long', 'lat', 'type'));

        $new = Model_Report::forge();
        $new->longitude = $get['long'];
        $new->latitude = $get['lat'];
        $new->event_id = $get['type'];
        $new->is_valid = false;
        $new->is_verify = false;
        $new->uid = $this->getUserUuid();

        $new->save();

        $nearBy = $new->findByRadius($new);

        if (count($nearBy) >= Model_Report::MIN_NEAR_BY_REPORT) {
            foreach ($nearBy as $value) {
                $report = Model_Report::find_by_id($value['id']);
                $report->setAsValid();
                $this->verifyingReport($report);
            }
        }

        Response::redirect('/disasters');
    }

    public function action_verifying()
    {
        $hour_ago = strtotime('-1 hour');

        $reports = Model_Report::find('all', array(
            'where' => array(
                array('created_at', ' >= ', date('Y-m-d H:i:s', $hour_ago)),
            ),
            'order_by' => array('created_at' => 'desc'),
        ));

        if (!empty($reports)) {
            foreach ($reports as $report) {
                $this->verifyingReport($report);
            }
        }
    }

    public function verifyingReport($report)
    {
        $headers = array('Accept' => 'application/json');
        $request = Requests::get(Config::get('mishapp.api_host') . '/disasters/verify?lat=' . $report->latitude . '&lon=' . $report->longitude . '&radius=' . Model_Report::MIN_NEAR_BY_REPORT, $headers);

        if ($request->status_code < 202) {
            $report->setAsVerified();
        }
    }
}
