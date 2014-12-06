<?php
class Controller_Admin_Tips extends Controller_Admin
{

    private function event($show = "name",  $events = array())
    {
        if(is_array($events)){
            foreach($events as $event){
                return $event->{$show};
            }
        }
    }

	public function action_index()
	{
		$data['tips'] = Model_Tip::find('all');
        $data['event'] = function($show = "name", $events = array()){
            return $this->event($show, $events);
        };
		$this->template->title = "Tips";
		$this->template->content = View::forge('admin/tips/index', $data);

	}

	public function action_view($id = null)
	{
		$data['tip'] = Model_Tip::find($id);
        $data['event'] = function($show = "name", $events = array()){
            return $this->event($show, $events);
        };

		$this->template->title = "Tip";
		$this->template->content = View::forge('admin/tips/view', $data);

	}

	public function action_create()
	{
        $view = View::forge('admin/tips/create');
		if (Input::method() == 'POST')
		{
			$val = Model_Tip::validate('create');

			if ($val->run())
			{
				$tip = Model_Tip::forge(array(
					'title' => Input::post('title'),
                    'object' => Input::post('object'),
					'object_id' => Input::post('object_id'),
					'content' => Input::post('content'),
				));

				if ($tip and $tip->save())
				{
					Session::set_flash('success', e('Added tip #'.$tip->id.'.'));

					Response::redirect('admin/tips');
				}

				else
				{
					Session::set_flash('error', e('Could not save tip.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

        $view->set_global('events', Arr::assoc_to_keyval(Model_Event::find('all'), 'id', 'name'));
		$this->template->title = "Tips";
		$this->template->content = View::forge('admin/tips/create');

	}

	public function action_edit($id = null)
	{
		$tip = Model_Tip::find($id);
		$val = Model_Tip::validate('edit');
        $view = View::forge('admin/tips/edit');

		if ($val->run())
		{
			$tip->title = Input::post('title');
            $tip->object = Input::post('object');
			$tip->object_id = Input::post('object_id');
			$tip->content = Input::post('content');

			if ($tip->save())
			{
				Session::set_flash('success', e('Updated tip #' . $id));

				Response::redirect('admin/tips');
			}

			else
			{
				Session::set_flash('error', e('Could not update tip #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$tip->title = $val->validated('title');
                $tip->object = $val->validated('object');
				$tip->object_id = $val->validated('object_id');
				$tip->content = $val->validated('content');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('tip', $tip, false);
		}

        $view->set_global('events', Arr::assoc_to_keyval(Model_Event::find('all'), 'id', 'name'));
		$this->template->title = "Tips";
		$this->template->content = $view;

	}

	public function action_delete($id = null)
	{
		if ($tip = Model_Tip::find($id))
		{
			$tip->delete();

			Session::set_flash('success', e('Deleted tip #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete tip #'.$id));
		}

		Response::redirect('admin/tips');

	}

}
