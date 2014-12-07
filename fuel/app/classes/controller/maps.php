<?php

class Controller_Maps extends Controller_Base
{
    public function action_index($page=1)
	{

        $result = Requests::get('http://127.0.0.1:5000/disasters?page=' . $page . '&per_page=10');
        $data['disaster'] = json_decode($result->body);

        $pagination = Pagination::forge('mypagination', array(
            'pagination_url' => null,
            'uri_segment' => 3,
            'total_items' => $data['disaster']->meta->total,
            'per_page' => $data['disaster']->meta->per_page,
        ));



		$this->template->title = 'Maps &raquo; Index';
		$this->template->content = View::forge('maps/index', $data );
	}
}
