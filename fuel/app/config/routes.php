<?php
return array(
	'_root_'  => 'welcome/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	'hello(/:name)?' => array('welcome/hello', 'name' => 'welcome_hello'),

	'todo' => array('todo/index', 'name' => 'todo_index'),
	'todo/add' => array('todo/add_task', 'name' => 'todo_add_task'),
	'todo/(?P<task_id>[0-9]+)/edit' => array('todo/edit_task', 'name' => 'todo_edit_task'),
	'todo/(?P<task_id>[0-9]+)/delete' => array('todo/delete_task', 'name' => 'todo_delete_task'),
);
