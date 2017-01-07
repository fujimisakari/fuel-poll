<?php

class Presenter_Todo_Index extends Presenter
{
	public function view()
	{
		$this->category_list = Model_Todo_Category::get_all();
	}
}
