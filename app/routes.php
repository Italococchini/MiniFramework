<?php 

$url = [
	"/index/:user_id/comment/:comment_id" => [
			"controller" => 'App\Controller\IndexController@index',
			"method" => ["GET", "POST"],
		],
	"/index/comment/:asd" => [
			"controller" => 'App\Controller\IndexController@index',
			"method" => ["COPY", "POST"],
		],
	"/" => [
			"method" => ["GET"],
			"controller" => 'App\Controller\IndexController@create',
		],
];


