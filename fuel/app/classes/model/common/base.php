<?php

class Model_Common_Base extends Orm\Model
{
	protected static function get_cache_path($pk)
	{
		return sprintf('%s_%s', get_called_class(), $pk);
	}

	protected static function get_cache_all_path()
	{
		return sprintf('%s_all', get_called_class());
	}

	public static function create_cache()
	{
		$obj_list = static::find('all');
		$all_cache_path = static::get_cache_all_path();
		static::cache($all_cache_path)->set($obj_list, null);

		foreach ($obj_list as $obj)
		{
			$cache_path = static::get_cache_path($obj->id);
			static::cache($cache_path)->set($obj, null);
		}
	}
}
