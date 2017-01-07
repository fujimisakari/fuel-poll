<?php

class Model_Todo_Task extends Orm\Model
{
	protected static $_properties = array(
		'id',
		'category_id' => array(
			'data_type' => 'int',
		),
		'title' => array(
			'data_type' => 'varchar',
			'label' => 'Title',
			'validation' => array('max_length' => array(200)),
			'form' => array('type' => 'text'),
			'default' => ''
		),
		'note' => array(
			'data_type' => 'text',
			'label' => 'Note',
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

	protected static $_observers = array(
		// 'Orm\\Observer_CreatedAt' => array(
		// 	'events' => array('before_insert'),
		// 	'mysql_timestamp' => true,
		// 	'overwrite' => true,
		// ),
		'Orm\\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => true,
			'overwrite' => true,
		),
	);

	public static function get_all()
	{
		return static::find('all');
	}

	public static function get_by_id($id)
	{
		return static::find($id);
	}

	public static function get_list_by_category_id($category_id)
	{
		return static::query()->where('category_id', $category_id)->get();
	}

	public static function do_create(array $init_data)
	{
		$class = new static($init_data);
		$class->created_at = \Date::time()->format('mysql');
		$class->updated_at = \Date::time()->format('mysql');
		$class->create();
		return $class;
	}

	public function do_save(array $update_data)
	{
		$this->category_id = $update_data['category_id'];
		$this->title = $update_data['title'];
		$this->note = $update_data['note'];
		$this->save();
	}

	public static function do_delete($task_id)
	{
		$task = static::find($task_id);
		if ($task)
		{
			$task->delete();
		}
	}

	public function edit_url()
	{
		return Router::get('todo_edit_task', array('task_id' => $this->id));
	}

	public function edit_link()
	{
		$attr = array(
			'href' => Router::get('todo_edit_task', array('task_id' => $this->id)),
		);
		return html_tag('a', $attr, $this->title);
	}

	public function delete_link()
	{
		$attr = array(
			'href' => Router::get('todo_delete_task', array('task_id' => $this->id)),
		);
		return html_tag('a', $attr, 'Delete');
	}
}
