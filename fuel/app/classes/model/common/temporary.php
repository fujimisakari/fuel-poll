<?php

class Model_Common_Temporary extends Model_Common_Base implements Model_Common_interface
{
	public static function cache($cache_path)
	{
		return Cache::forge($cache_path, 'redis');
	}

	public static function get_cache($pk)
	{
		try
		{
			$cache_path = static::get_cache_path($pk);
			$obj = static::cache($cache_path)->get(false);
		}
		catch (\CacheNotFoundException $_)
		{
			$obj = static::find($pk);
			static::cache($cache_path)->set($obj, null);
		}
		return $obj;
	}

	public static function get_cache_all()
	{
		try
		{
			$cache_path = static::get_cache_all_path();
			$obj_list = static::cache($cache_path)->get(false);
		}
		catch (\CacheNotFoundException $_)
		{
			$obj_list = static::find('all');
			static::cache($cache_path)->set($obj_list, null);
		}
		return $obj_list;
	}

	public static function clear_cache()
	{
		$class_name = get_class(get_called_class());
		foreach (static::get_cache_all() as $obj)
		{
			static::cache(static::get_cache_path($obj->id))->delete();
		}
		static::cache(static::get_cache_all_path())->delete();
	}

	public function save($cascade = null, $use_transaction = false)
	{
		parent::save($cascade, $use_transaction);
		static::cache(static::get_cache_path($this->id))->delete();
		static::cache(static::get_cache_all_path())->delete();
	}

	public function delete($cascade = null, $use_transaction = false)
	{
		static::cache(static::get_cache_path($this->id))->delete();
		static::cache(static::get_cache_all_path())->delete();
		parent::delete($cascade, $use_transaction);
	}
}
