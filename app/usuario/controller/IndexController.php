<?php namespace App\usuario\Controller;

use Library\view;

 class IndexController 
 {
 	function index( $request )
 	{
 		// $result = \Library\curl::get([]);
 		return view::load('home', 'usuario', $request);
 	}

 	function create( $request )
 	{
 		return view::load('create', 'usuario', $request);
 	}
 } 
