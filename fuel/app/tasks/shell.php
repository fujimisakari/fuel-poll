<?php

namespace Fuel\Tasks;

class shell
{
	/**
	 * Class initialization
	 */
	public function __construct()
	{
		// load the migrations config
		\Config::load('db', true);
	}

	/**
	 * Show help.
	 *
	 * Usage (from command line):
	 *
	 * php oil refine fromdb
	 */
	public static function run()
	{
		require(realpath(DOCROOT).DIRECTORY_SEPARATOR.'psysh');
		eval(\Psy\sh());
	}
}
