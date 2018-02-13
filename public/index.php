<?php
	require_once '../vendor/autoload.php';
	
	defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../'));

	Library\bootstrap::run( $_SERVER );

// ****************************
// Testing
// ****************************
	 