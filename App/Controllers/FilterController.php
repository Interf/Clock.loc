<?php

class FilterController
{
	use App\Models\TProd;

	public function actionIndex()
	{
		if(isset($_GET['do_find'])) {

			$were = App\Models\TProd::getQueryByCat(@$_GET['category']);
			$were .= " ". App\Models\TProd::getQueryByBrand(@$_GET['brand']);

			$filter = App\Models\Sidebar::getProdByCatAndPage($were, @$_GET['page']);

			$max_page = App\Models\Sidebar::countPagesByCat($were);
		}

		include_once(ROOT.'/public/view/filter/filter.php');
		return true;
	}
}	