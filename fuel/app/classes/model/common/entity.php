<?php

class Model_Common_Entity extends Model_Common_Base implements Model_Common_interface
{
	public static function cache($cache_path)
	{
		return Cache::forge($cache_path, 'redis');
	}

	public static function get_cache($pk)
	{
		$cache_path = static::get_cache_path($pk);
		$obj = static::cache($cache_path)->get(false);
		return $obj;
	}

	public static function get_cache_all()
	{
		$cache_path = static::get_cache_all_path();
		$obj_list = static::cache($cache_path)->get(false);
		return $obj_list;
	}
}
