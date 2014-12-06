<?php
class Controller_Tips extends Controller_Template
{

	public function action_index()
	{
		$data['tips'] = Model_Tip::find('all');
		$this->template->title = "Tips";
		$this->template->content = View::forge('tips/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('tips');

		if ( ! $data['tip'] = Model_Tip::find($id))
		{
			Session::set_flash('error', 'Could not find tip #'.$id);
			Response::redirect('tips');
		}

		$this->template->title = "Tip";
		$this->template->content = View::forge('tips/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Tip::validate('create');

			if ($val->run())
			{
				$tip = Model_Tip::forge(array(
					'title' => Input::post('title'),
					'event' => Input::post('event'),
					'content' => Input::post('content'),
				));

				if ($tip and $tip->save())
				{
					Session::set_flash('success', 'Added tip #'.$tip->id.'.');

					Response::redirect('tips');
				}

				else
				{
					Session::set_flash('error', 'Could not save tip.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Tips";
		$this->template->content = View::forge('tips/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('tips');

		if ( ! $tip = Model_Tip::find($id))
		{
			Session::set_flash('error', 'Could not find tip #'.$id);
			Response::redirect('tips');
		}

		$val = Model_Tip::validate('edit');

		if ($val->run())
		{
			$tip->title = Input::post('title');
			$tip->event = Input::post('event');
			$tip->content = Input::post('content');

			if ($tip->save())
			{
				Session::set_flash('success', 'Updated tip #' . $id);

				Response::redirect('tips');
			}

			else
			{
				Session::set_flash('error', 'Could not update tip #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$tip->title = $val->validated('title');
				$tip->event = $val->validated('event');
				$tip->content = $val->validated('content');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('tip', $tip, false);
		}

		$this->template->title = "Tips";
		$this->template->content = View::forge('tips/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('tips');

		if ($tip = Model_Tip::find($id))
		{
			$tip->delete();

			Session::set_flash('success', 'Deleted tip #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete tip #'.$id);
		}

		Response::redirect('tips');

	}

}
