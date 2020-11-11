<?php

namespace App\Models;

class Products
{
	public static function getProdById($id)
	{
		$db = \DB\DB::Connect();

		$one_db = $db->prepare("SELECT * FROM products WHERE id = :id");
		$one_db->execute(["id"=>$id]);

		$one_arr = $one_db->fetchObject();

		if($one_arr !== false) {
			$one_arr->img = explode(",", str_replace(" ", "", $one_arr->img));
			return $one_arr;
		} else {
			return false;
		}
	}






	const COUNT_PROD_ON_PAGE = 2;

	use TProd;

	private static function countProductsByCat($category)
	{
		$db = \DB\DB::Connect();

		$were = TProd::getQueryByCat($category);
		$count_db = $db->query("SELECT COUNT(`id`) as cnt FROM products $were");
		
		$count = $count_db->fetchObject();
		return $count->cnt;
	}

	public static function countPagesByCat($category)
	{
		$count = self::countProductsByCat($category);
		$count_pages = ceil($count / self::COUNT_PROD_ON_PAGE);
		return $count_pages;
	}


	public static function getProdByCatAndPage($category, $page = 1)
	{
		$page = (int) $page;
		$category = trim(htmlspecialchars($category));

		$max_page = self::countPagesByCat($category);

		if($page <= 1 || $page > $max_page) $page = 1;

		$limit = self::COUNT_PROD_ON_PAGE;

		$start = ($limit * $page) - $limit;

		$were = TProd::getQueryByCat($category);

		$db = \DB\DB::Connect();

		$prod_db = $db->prepare("
			SELECT id,title,brand,img,discount,price,is_active 
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