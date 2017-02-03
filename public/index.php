<?php
	require_once '../vendor/autoload.php';
	
	defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../'));

    $request = Library\bootstrap::load();
	Library\bootstrap::run( $request ); 
