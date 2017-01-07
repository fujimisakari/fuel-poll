<?php

function with_transaction($func)
{
	$db = Database_Connection::instance();
	$db->start_transaction();

	try
	{
		$func();
		$db->commit_transaction();
	}
	catch (\Exception $e)
	{
		$db->rollback_transaction();
	}
}
