<?php
/*
** DooLite - A NANO PHP MVC FRAMEWORK
** Author - Shardul Bagade
** website - shardulbagade.com
*/

// package - lib/node.php


// class dealing with URL fragments
class node
{

	var $url_arr_param = array(
		'0' => 'route_to',
		'1' => 'call_function',
		'2' => 'gamma',
		'3' => 'delta',
		'4' => 'epsilon'
	);
	
	function set($key, $value)
	{
		$this->$key = $value;
	}
	
	function get($key)
	{
		return $this->$key;
	}

	public $routes = array();
	
	function router()
	{
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, "/");
		$url_array = explode("/", $url);
		
		//var_dump($url_array);
		foreach($url_array as $key => $value)
		{
			if(isset($this->url_arr_param[$key]))
			{
				$this->set($this->url_arr_param[$key], $value);
			}
			else
			{
				$this->set($key, $value);
			}
			
			//$this->routes[$key] = $value;
		}
		
		var_dump($this);
		//print_r($this);
		
		$route_to = $this->route_to;
		$file = "app" . DS . "controllers" . DS . $route_to . ".php";
		
		require_once "app" . DS . "controllers" . DS . "root.php";
		$root = new root();
			
		if(file_exists($file))
		{
			require_once $file;
			$app = new $route_to();
			
			if(isset($this->call_function))
			{
				$call_function = $this->call_function;
				
				if(method_exists($route_to, $call_function))
				{
					$app->$call_function();
				}
				else
				{
					// if called method does not exists
					$app->main();
				}
				
			}
			else
			{
				// if no method is called
				$app->main();
			}
			
		}
		else
		{
			if(method_exists('root', $route_to))
			{
				$root->$route_to();
			}
			else
			{
				$root->main();
			}
		}
		
	}
}



?>