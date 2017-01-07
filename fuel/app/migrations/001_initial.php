<?php

namespace Fuel\Migrations;

class Initial
{
    function up()
    {
        \DBUtil::create_table('todo_categories', array(
            'id' => array('type' => 'int', 'AUTO_INCREMENT' => true),
            'name' => array('type' => 'varchar', 'constraint' => 200),
            'created_at' => array('type' => 'datetime'),
            'updated_at' => array('type' => 'datetime'),
        ), array('id'));

        \DBUtil::create_table('todo_tasks', array(
            'id' => array('type' => 'int', 'AUTO_INCREMENT' => true),
            'category_id' => array('type' => 'int'),
            'title' => array('type' => 'varchar', 'constraint' => 200),
            'note' => array('type' => 'text'),
            'created_at' => array('type' => 'datetime'),
            'updated_at' => array('type' => 'datetime'),
        ), array('id'));
    }

    function down()
    {
       \DBUtil::drop_table('todo_categories');
       \DBUtil::drop_table('todo_tasks');
    }
}