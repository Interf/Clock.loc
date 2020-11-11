<?php

namespace App\Models;

class Cart
{
	public static function getCart()
	{
		$_SESSION['total_price'] = 0;
		$id_list = array_keys($_SESSION['cart']);
		$mask = str_repeat("?,", self::countCart()-1).'?';

		$db = \DB\DB::Connect();

		$cart_db = $db->prepare("SELECT id,title,brand,img,price,discount FROM products WHERE is_active = 1 AND id IN ($mask)");
		$cart_db->execute($id_list);

		while($cart = $cart_db->fetchObject()) {
			$cart->price = DiscountPrice::getPrice($cart->price, $cart->discount);

			$_SESSION['total_price'] += $cart->price;

			$cart->img = explode(",", $cart->img);
			$cart_arr[] = $cart;
		}

		return $cart_arr;
	}

	public static function addProdInCart($id)
	{
		$id = (int) $id;

		$tmp_list = array();

		if(!empty($_SESSION['cart'])) {
			$tmp_list = $_SESSION['cart'];
		}
	
		if(!array_key_exists($id, $tmp_list)) {
			$tmp_list[$id] = 1;
		}

		$_SESSION['cart'] = $tmp_list;
	}

	public static function delFromCart($id)
	{
		$id = (int) $id;

		if(isset($_SESSION['cart'][$id])) {
			unset($_SESSION['cart'][$id]);
		}
	}

	public static function countCart()
	{
		if(!isset($_SESSION['cart'])) {
			return 0;
		}
		return count($_SESSION['cart']);
	}

	public static function getTotalPrice()
	{
		$id_list = array_keys($_SESSION['cart']);
		$mask = str_repeat("?,", self::countCart()-1).'?';

		$db = \DB\DB::Connect();

		$cart_db = $db->prepare("SELECT price, discount FROM products WHERE is_active = 1 AND id IN ($mask)");
		$cart_db->execute($id_list);

		while($cart = $cart_db->fetchObject()) {
			$cart->price = DiscountPrice::getPrice($cart->price, $cart->discount);

			$total_price += $cart->price;
		}

		return $total_price;
	}

}