<?php

namespace App\Models;

class getMenu
{
	public static function getMenu()
	{
		$db = \DB\DB::Connect();

		$menu_db = $db->query("SELECT * FROM `menu`");

		while($menu = $menu_db->fetchObject()) {
			$menu_arr[] = $menu;
		}

		return $menu_arr;
	}
}