<?php

class Presenter_Todo_Edit extends Presenter
{
	public function view()
	{
		$task_id = $this->request()->param('task_id');
		$this->task = Model_Todo_Task::get_by_id($task_id);
		$this->select_category_list = Model_Todo_Category::get_category_list_for_select_form();
	}
}
