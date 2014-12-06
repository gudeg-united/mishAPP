<?php
class Controller_Admin_Events extends Controller_Admin
{
    public $status = array(0 => 'disable', 1 => 'enable');

	public function action_index()
	{
		$data['events'] = Model_Event::find('all');
        $data['status'] = $this->status;

		$this->template->title = "Events";
		$this->template->content = View::forge('admin/events/index', $data);

	}

	public function action_view($id = null)
	{
		$data['event'] = Model_Event::find($id);
        $data['status'] = $this->status;

		$this->template->title = "Event";
		$this->template->content = View::forge('admin/events/view', $data);

	}

	public function action_create()
	{
        $view = View::forge('admin/events/create');
		
        if (Input::method() == 'POST')
		{
			$val = Model_Event::validate('create');

			if ($val->run())
			{
				$event = Model_Event::forge(array(
					'name' => Input::post('name'),
					'status' => Input::post('status'),
				));

				if ($event and $event->save())
				{
					Session::set_flash('success', e('Added event #'.$event->id.'.'));

					Response::redirect('admin/events');
				}

				else
				{
					Session::set_flash('error', e('Could not save event.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

        $view->set_global('status', $this->status);
		$this->template->title = "Events";
		$this->template->content = $view;

	}

	public function action_edit($id = null)
	{
		$event = Model_Event::find($id);
		$val = Model_Event::validate('edit');
        $view = View::forge('admin/events/edit');

		if ($val->run())
		{
			$event->name = Input::post('name');
			$event->status = Input::post('status');

			if ($event->save())
			{
				Session::set_flash('success', e('Updated event #' . $id));

				Response::redirect('admin/events');
			}

			else
			{
				Session::set_flash('error', e('Could not update event #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$event->name = $val->validated('name');
				$event->status = $val->validated('status');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('event', $event, false);
		}

        $view->set_global('status', $this->status);
		$this->template->title = "Events";
		$this->template->content = $view;

	}

	public function action_delete($id = null)
	{
		if ($event = Model_Event::find($id))
		{
			$event->delete();

			Session::set_flash('success', e('Deleted event #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete event #'.$id));
		}

		Response::redirect('admin/events');

	}

}
