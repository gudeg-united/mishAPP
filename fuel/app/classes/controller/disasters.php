<?php

class Controller_Disasters extends Controller_Base
{

    public function action_index($page=1)
    {
        $get = Input::get(array('page'));
        
        if (isset($get['page']))
            $page = $get['page'];

        $headers = array('Accept' => 'application/json');
        $result = Requests::get(Config::get('mishapp.api_host') . '/disasters?page=' . $page . '&per_page=10', $headers);
        $data['disaster'] = json_decode($result->body);
        $this->template->title = "Disaster Global";
        $data['pagination'] = Pagination::forge('mypagination', array(
            'pagination_url' => Uri::create('/disasters/index'),
            'uri_segment' => 'page',
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

    public function action_nearby($page=1)
    {
        $get = Input::get(array('long', 'lat'));
        $query = Uri::build_query_string(
            array('page' => $page),
            array('per_page' => 10),
            array('lon' => $get['long']),
            array('lat' => $get['lat']),
            array('radius' => 100000)
        );

        $headers = array('Accept' => 'application/json');
        $request = Requests::get(Config::get('mishapp.api_host') . '/disasters/nearby?' . $query, $headers);
        $this->template->title = "Disaster Nearby";

        if ($request->status_code < 202) {
            $disaster = json_decode($request->body);
            $this->template->content = View::forge('disaster/nearby', array('disaster' => $disaster));
        } else {
            Response::redirect('/disasters');
        }
    }

    private function event($show = "show", $events = array())
    {
        if(is_array($events)){
            foreach($events as $event){
                return $event->{$show};
            }
        }
    }

    public function action_tips()
    {
        $data['tips'] = Model_Tip::find('all');
        $data['event'] = function($show = "name", $events = array()){
            return $this->event($show, $events);
        };

        $this->template->title = 'Disaster &raquo; Tips';
        $this->template->content = View::forge('disaster/tips', $data);
    }
}
