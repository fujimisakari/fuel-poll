<?php

class Controller_Todo extends Controller
{
	public function get_index()
	{
		return Response::forge(Presenter::forge('todo/index'));
	}

	public function action_add_task()
	{
		if (Input::method() === 'GET')
		{
			return Response::forge(View::forge('todo/add_task'));
		}

		with_transaction(function ()
		{
			$init_data = array(
				'category_id' => 1,
				'title' => Input::param('title'),
				'note' => Input::param('note'),
			);
			Model_Todo_Task::do_create($init_data);
		});

		return Response::redirect(Router::get('todo_index'));
	}

	public function action_edit_task()
	{
		if (Input::method() === 'GET')
		{
			return Response::forge(Presenter::forge('todo/edit'));
		}

		with_transaction(function ()
		{
			$task_id = $this->request->param('task_id');
			$task = Model_Todo_Task::get_by_id($task_id);
			$update_data = array(
				'category_id' => Input::param('category_id'),
				'title' => Input::param('title'),
				'note' => Input::param('note'),
			);
			$task->do_save($update_data);
		});

		return Response::redirect(Router::get('todo_index'));
	}

	public function action_delete_task()
	{
		with_transaction(function ()
		{
			$task_id = $this->request->param('task_id');
			if ($task_id) {
				Model_Todo_Task::do_delete($task_id);
			}
		});

		return Response::redirect('todo/index');
	}
}
