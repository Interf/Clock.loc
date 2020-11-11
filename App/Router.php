<?php

namespace App;

class Router
{

	private static function getRoutes()
	{
		return include_once(DATA::ROUTES);
	}

	private static function getUri()
	{
		if(!empty($_SERVER['REQUEST_URI'])) {
			return trim(htmlspecialchars($_SERVER['REQUEST_URI']), "/");
		}
	}

	public function __construct()
	{
		$uri = $this->getUri();

		foreach ($this->getRoutes() as $uriPattern => $path) {
			if(preg_match("~$uriPattern~", $uri)) {
				$innerPath = preg_replace("~$uriPattern~", $path, $uri);
				$segments = explode("/", $innerPath);
				$controllerName = ucfirst(array_shift($segments))."Controller";
				$actionName = "action". ucfirst(array_shift($segments));
				$parametrs = $segments;
				$controllerFile = ROOT."/App/Controllers/".$controllerName.".php";
				
				if(file_exists($controllerFile)) {
					include_once($controllerFile);
				} else {
					echo "Ошибка подключения контроллера";
				}

				if(!method_exists($controllerName, $actionName)) {
					echo "Ошибка вызова метода";
				}

				$controllerObj = new $controllerName;
				$result = call_user_func_array(array($controllerObj, $actionName), $parametrs);
				if($result !== false) {
					break;
				}
			}
		}



	}



}