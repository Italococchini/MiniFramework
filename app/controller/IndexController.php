<?php namespace App\Controller;

use Library\view;

 class IndexController 
 {
 	function index( $request )
 	{
 		// $result = \Library\curl::get([]);
 		return view::load('home', $request);
 	}

 	function create( $request )
 	{
 		return view::load('create', $request);
 	}
 } 
