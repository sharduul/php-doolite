<?php
/*
** KITE - A NANO PHP MVC FRAMEWORK
** Author - Shardul Bagade
** website - shardulbagade.com
*/

// package - index.php


$url = isset($_GET['url']) ? $_GET['url'] : null;
$url = rtrim($url, "/");
$url_array = explode("/", $url);


// function call. depending on the url.
if(function_exists($url_array[0]))
{
	$url_array[0](isset($url_array[1]) ? $url_array[1] : null);
}
else
{
	default_function();
}


/*
switch($url_array[0])
{
	case 'about':
		echo 'this is about page';
		break;
	case 'services':
		echo 'this is services page';
		break;
	case 'contact':
		echo 'this is contact page';
		break;
	default:
		echo 'this is default page';
		break;
}
*/

function about($name)
{
	echo 'this is about page ' .  $name;
}


function services()
{
	echo 'this is services page';
}


function  contact()
{
	echo 'this is contact page';
}

function default_function()
{
	echo 'this is default page';
}





//var_dump($array);
//echo $url;
?>