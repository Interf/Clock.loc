<?php

namespace App\Models;

class DiscountPrice
{
	public static function getPrice($current_price, $precent = 0)
	{
		if($precent == 0) {
			return $current_price;
		} else {
			return $current_price - ($current_price * ($precent / 100));
		}
	}
}