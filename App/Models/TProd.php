<?php

namespace App\Models;

trait TProd
{
	public static function getQueryByCat($category)
	{
		switch (strtolower(trim(htmlspecialchars($category)))) {
			case 'men':
			return 'WHERE category = "Men" AND is_active = 1';
			break;
			case 'women':
			return 'WHERE category = "Women" AND is_active = 1';
			break;
			case 'kids':
			return 'WHERE category = "Kids" AND is_active = 1';
			break;
			default:
			return 'WHERE is_active = 1';
			
		}
	}

	public static function getQueryByBrand($brand)
	{
		switch (trim(htmlspecialchars($brand))) {
			case 'any':
			return "";
			break;
			case '':
			return "";
			break;
			
			default:
			return "AND brand = '$brand'";
			break;
		}
	}
}