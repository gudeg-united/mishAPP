<?php

class Controller_Disasters extends Controller_Base
{

    public function action_index($page=1)
    {
        $headers = array('Accept' => 'application/json');
        // $result = Requests::get('http://127.0.0.1:5000/disasters?page=' . $page . '&per_page=10');
        // die(var_dump(Config::get('mishapp.api_host') . '/disasters/?page=' . $page . '&per_page=10'));
        $result = Requests::get(Config::get('mishapp.api_host') . '/disasters?page=' . $page . '&per_page=10', $headers);
        $data['disaster'] = json_decode($result->body);
        // die(var_dump($data['disaster']));
        $this->template->title = "Disaster Global";
        $pagination = Pagination::forge('mypagination', array(
            'pagination_url' => null,
            'uri_segment' => 3,
            'total_items' => $data['disaster']->meta->total,
            'per_page' => $data['disaster']->meta->per_page,
        ));



        $this->template->title = 'Disaster &raquo; Global';
        $this->template->content = View::forge('disaster/index', $data );
    }

    public function action_detail()
    {
        $get = Input::get(array('id'));

        if (empty($get['id']))
            Response::redirect('/disasters');

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
            Response::redirect('/disasters');
        }
    }
}
