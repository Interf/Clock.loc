<?php

class HomeController
{
	public function actionIndex()
	{
		$home_prod = App\Models\getHomeProd::getHomeProd();
		
		include_once(ROOT."/public/view/home/home.php");
		return true;
	}
}