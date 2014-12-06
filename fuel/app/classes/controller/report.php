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
    
    public function action_disaster()
    {
        $get = Input::get(array('long', 'lat', 'type'));

        $new = Model_Report::forge();
        $new->longitude = $get['long'];
        $new->latitude = $get['lat'];
        $new->event_id = $get['type'];
        $new->uid = $this->getUserUuid();

        $new->save();

        Response::redirect('/maps');        
    }
}
