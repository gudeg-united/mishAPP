<?php

class Controller_Maps extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Maps &raquo; Index';
		$this->template->content = View::forge('maps/index', $data);
	}

}
