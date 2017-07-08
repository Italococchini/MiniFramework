<?php namespace App\Controller;

use Library\view;

 class IndexController 
 {
 	function index( $request )
 	{
 		// $result = \Library\curl::get([]);
print_r($request);
 		return view::load('home', $request);
 	}

 	function create( $request )
 	{
print_r($request);
 		return view::load('create', $request);
 	}
 } 
