<?php

class Controller_Disasters extends Controller_Base
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
            $disaster = json_decode($request->body);
            list($long, $lat) = $disaster->geometry->coordinates;
            $event = Model_Event::find_by_name(ucfirst(strtolower($disaster->properties->type)));
            $community_report = Model_Report::forge()->findNearByReport($long, $lat, 5, $event->id);
            $this->template->content = View::forge('disaster/detail', array('disaster' => $disaster, 'community_report' => $community_report));
        } else {
            Response::redirect('/maps');
        }
    }
}
