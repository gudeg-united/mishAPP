<?php
class Controller_Admin_Events extends Controller_Admin
{

	public function action_index()
	{
		$data['events'] = Model_Event::find('all');
		$this->template->title = "Events";
		$this->template->content = View::forge('admin/events/index', $data);

	}

	public function action_view($id = null)
	{
		$data['event'] = Model_Event::find($id);

		$this->template->title = "Event";
		$this->template->content = View::forge('admin/events/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Event::validate('create');

			if ($val->run())
			{
				$event = Model_Event::forge(array(
					'name' => Input::post('name'),
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

		$this->template->title = "Events";
		$this->template->content = View::forge('admin/events/create');

	}

	public function action_edit($id = null)
	{
		$event = Model_Event::find($id);
		$val = Model_Event::validate('edit');

		if ($val->run())
		{
			$event->name = Input::post('name');

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

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('event', $event, false);
		}

		$this->template->title = "Events";
		$this->template->content = View::forge('admin/events/edit');

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
