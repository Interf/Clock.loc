<?php

use App\Models\Products;

class ProdController
{
	public function actionIndex($category)
	{
		isset($_GET['page']) < 1 ? $page = 1 : $page = (int) $_GET['page'];
		$prod_arr = Products::getProdByCatAndPage($category, $page);

		$max_page = Products::countPagesByCat($category);
		
		include_once(ROOT.'/public/view/products/catalog.php');
		return true;
	}

	public function actionSingle($id_prod)
	{
		$id_prod = (int) $id_prod;

		$one_prod = Products::getProdById($id_prod);

		include_once(ROOT.'/public/view/products/single.php');
		return true;
	}
}
