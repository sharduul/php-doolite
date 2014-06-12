<?php
/*
** DooLite - A NANO PHP MVC FRAMEWORK
** Author - Shardul Bagade
** website - shardulbagade.com
*/

// package - index.php


class DooLite
{

	public $routes = array();
	
	function router()
	{
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, "/");
		$url_array = explode("/", $url);
		
		foreach($url_array as $key => $value)
		{
			$this->routes[$key] = $value;
		}
		
		//print_r($this);
		
		require_once "app/controller.php";
		$method = $this->routes[0];
		
		
		if($method)
		{
			$app = new app();
			if(method_exists('app', $method))
			{
				$app->$method();
			}
			else
			{
				$app->main();
			}
		}
	}
}

$DooLite = new DooLite();
$DooLite->router();


?>