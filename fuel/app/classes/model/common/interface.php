<?php

interface Model_Common_interface
{
	public static function cache($cache_path);

	public static function get_cache($pk);

	public static function get_cache_all();
}
