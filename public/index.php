<?php
	require_once '../vendor/autoload.php';
	
	defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../'));

	$request = Library\bootstrap::load(); 
print_r($request);
	Library\bootstrap::run( $request ); 
