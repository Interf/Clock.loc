<?php
namespace DB;

use App\DATA;

class DB
{
	public static function  Connect()
	{
		try {
			$db = new \PDO(DATA::DB_TYPE.":host=".DATA::DB_HOST.";dbname=".DATA::DB_NAME."", DATA::DB_USER_NAME, DATA::DB_USER_PASS);
			return $db;
		} catch (Error $e) {
			exit("Access failed". $e->getMessage());
		}
	}
}
