<?php

session_start();

define("ROOT", dirname(__FILE__));


// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);


function debug($value)
{

	echo '<pre style="
	background-color: #222;
	height: 500px;
	overflow-y: scroll;
	border-bottom: 30px solid #82b344;
	color: #82b344;
	border-top: 30px solid #82b344;
	padding: 25px;
	width: 95%;
	margin: 0 auto;
	">';
	if($value == null) {
		echo "Null";
	} else {
		print_r($value);
	}
	echo "</pre>";

}



require_once(ROOT.'/vendor/autoload.php');


$db = \DB\DB::Connect();



$router = new App\Router;