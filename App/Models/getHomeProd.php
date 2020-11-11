<?php

namespace App\Models;

class getHomeProd
{
	public static function getHomeProd()
	{
		$db = \DB\DB::Connect();

		$prod_db = $db->query("SELECT id,title,brand,img,discount,price,is_active FROM products ORDER BY `id` DESC LIMIT 4");

		while($prod = $prod_db->fetchObject()) {

			$prod->img = explode(",", $prod->img);

			$prod_arr[] = $prod;
		}

		return $prod_arr;
	}
}