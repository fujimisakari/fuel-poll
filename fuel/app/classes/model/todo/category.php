<?php

class Model_Todo_Category extends Model_Common_Entity
{
	protected static $_properties = array(
		'id',
		'name' => array(
			'data_type' => 'varchar',
			'label' => 'Category Name',
			'validation' => array('max_length' => array(200)),
			'form' => array('type' => 'text'),
			'default' => ''
		),
		'created_at' => array(
			'data_type' => 'datetime',
			'label' => 'Created At',
			'form' => array('type' => false)
		),
		'updated_at' => array(
			'data_type' => 'datetime',
			'label' => 'Updated At'
		),
	);

	public static function get_all()
	{
		return static::get_cache_all();
	}

	public static function get_by_id($id)
	{
		return static::get_cache($id);
	}

	public static function get_category_list_for_select_form()
	{
		$all_category_list = static::get_cache_all();
		$category_list = array();
		foreach ($all_category_list as $category)
		{
			$category_list[$category->id] = $category->name;
		}
		return $category_list;
	}

	public function get_task_list()
	{
		return Model_Todo_Task::get_list_by_category_id($this->id);
	}

	public static function do_create(array $init_data)
	{
		$class = new static($init_data);
		$class->created_at = \Date::time()->format('mysql');
		$class->updated_at = \Date::time()->format('mysql');
		$class->create();
		return $class;
	}

	public function do_update(array $update_data)
	{
		$this->name = $update_data['name'];
		$this->save();
	}
}
