<?php namespace Library;

Class router{

	public $router = [];

	public static function collection(){		
		return require_once APPLICATION_PATH . "/app/routes.php";
	} 
}