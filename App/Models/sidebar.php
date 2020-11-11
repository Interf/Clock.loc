<?php

namespace App\Models;

class Sidebar
{
	public static function getCategory()
	{
		$db = \DB\DB::Connect();

		$cat_db = $db->query("SELECT category FROM products");


		while($cat = $cat_db->fetch(\PDO::FETCH_ASSOC)) {
			$cat_arr[] = $cat;
		}

		return array_unique($cat_arr, SORT_REGULAR);
	}

	public static function getBrand()
	{
		$db = \DB\DB::Connect();

		$brand_db = $db->query("SELECT brand FROM products");

		while($brand = $brand_db->fetch(\PDO::FETCH_ASSOC))
		{
			$brand_arr[] = $brand;
		}

		return array_unique($brand_arr, SORT_REGULAR);
	}







	const COUNT_PROD_ON_PAGE = 2;

	private static function countProductsByCat($were)
	{
		$db = \DB\DB::Connect();

		$count_db = $db->query("SELECT COUNT(`id`) as cnt FROM products $were");
		
		$count = $count_db->fetchObject();
		return $count->cnt;
	}

	public static function countPagesByCat($were)
	{
		$count = self::countProductsByCat($were);
		$count_pages = ceil($count / self::COUNT_PROD_ON_PAGE);
		return $count_pages;
	}


	public static function getProdByCatAndPage($were, $page = 1)
	{
		$page = (int) $page;

		$max_page = self::countPagesByCat($were);

		if($page <= 1 || $page > $max_page) $page = 1;

		$limit = self::COUNT_PROD_ON_PAGE;

		$start = ($limit * $page) - $limit;

		$db = \DB\DB::Connect();

		$prod_db = $db->prepare("
			SELECT id,title,brand,img,discount,price,is_active, category 
			FROM products
			$were
			ORDER BY `id` DESC LIMIT :start, :lim");
		$prod_db->bindParam(':start', $start, \PDO::PARAM_INT);
		$prod_db->bindParam(':lim', $limit, \PDO::PARAM_INT);
		$result = $prod_db->execute();

		while($prod = $prod_db->fetchObject()) {
			$prod->img = explode(",", str_replace(" ", "", $prod->img));
			$prod_arr[] = $prod;
		}

		return @$prod_arr;
	}




}