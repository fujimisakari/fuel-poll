<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
	'default' => array(
		'connection' => array(
			'dsn'       => sprintf('mysql:host=%s;dbname=%s', getenv('DB_HOST'), getenv('DB_NAME')),
			'username'  => getenv('DB_USER'),
			'password'  => getenv('DB_PASS'),
		),
	),

	'redis' => array(
		'default' => array(
			'hostname'  => getenv('REDIS_HOST'),
			'port'      => 6379,
			'timeout'   => null,
			'database'  => 0,
		),
	),
);
