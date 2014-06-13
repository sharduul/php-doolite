<?php
/*
** DooLite - A NANO PHP MVC FRAMEWORK
** Author - Shardul Bagade
** website - shardulbagade.com
*/

// package - lib/doolite.php


class DooLite
{
	
	private static $instance = array();
	
	function main()
	{
		require_once "lib" . DS . "node.php";
		$node = DooLite::getInstance('node');
		$node->router();
	}
	
	
	// singleton pattern
	public static function getInstance($class)
	{
		if(isset(self::$instance[$class]))
		{
			return self::$instance[$class];
		}
		else
		{
			self::$instance[$class] = new $class();
			return self::$instance[$class];
		}
	}
	
}


?>