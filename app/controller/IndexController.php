<?php

use Library\view;

 class IndexController 
 {
 	function index( $request )
 	{
 		return view::load('home', $request);
 	}
 } 
