<?php

namespace Fuel\Tasks;

class Cache
{
	public function __construct()
	{
		// load the migrations config
		\Config::load('db', true);
	}

	public static function update()
	{
		\Model_Todo_Category::create_cache();
	}
}
