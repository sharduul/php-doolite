<?php
/*
** DooLite - A NANO PHP MVC FRAMEWORK
** Author - Shardul Bagade
** website - shardulbagade.com
*/

// package - index.php
// triggering doolite class



define('DS', DIRECTORY_SEPARATOR);
require_once "lib" . DS . "doolite.php";

$DooLite = new DooLite();
$DooLite->main();


?>