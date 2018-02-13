<?php namespace App\tienda\Controller;

use Library\view;

 class IndexController 
 {

 	function tienda( $request )
 	{
 		return view::load('tienda', 'tienda', $request);
 	}
 } 
