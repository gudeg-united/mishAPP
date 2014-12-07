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
class Controller_Welcome extends Controller_Base
{

    /**
     * The basic welcome message
     *
     * @access  public
     * @return  Response
     */
    public function action_index()
    {
        $buttons = Model_Event::find('all');
        
        $this->template->title = "Home";
		$this->template->content = View::forge('welcome/index', array('buttons' => $buttons));
    }

    /**
     * The 404 action for the application.
     *
     * @access  public
     * @return  Response
     */
    public function action_404()
    {
        $buttons = Model_Event::find('all');

        $this->template->title = "Page Not Found";
        $this->template->content = Response::forge(Presenter::forge('welcome/404'), 404);
    }

    /**
     * Coming Soon
     */
    public function action_missing()
    {
        $this->template->title = "Missing People";
		$this->template->content = View::forge('welcome/missing_people');
    }

    public function action_supplies()
    {
        $this->template->title = "Food Suply";
		$this->template->content = View::forge('welcome/supplies');
    }

    /**
     * About
     */
    public function action_about()
    {
        $this->template->title = "About";
		$this->template->content = View::forge('welcome/about');
    }
}
