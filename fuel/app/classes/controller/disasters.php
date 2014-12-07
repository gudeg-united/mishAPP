<?php

class Controller_Disasters extends Controller_Template
{

    public function action_index()
    {
        Response::redirect('/maps');
    }

    public function action_detail()
    {
        $get = Input::get(array('id'));

        if (empty($get['id']))
            Response::redirect('/maps');

        $headers = array('Accept' => 'application/json');
        $request = Requests::get(Config::get('mishapp.api_host') . '/disasters/' . $get['id'], $headers);
        $this->template->title = "Disaster Detail";
        
        if ($request->status_code < 202) {
            $this->template->content = View::forge('disaster/detail', array('disaster' => $request->body));
        } else {
            Response::redirect('/maps');
        }
    }
}
