<?php 

return [
	"/index/:user_id/comment/:comment_id" => [
			"controller" => 'App\Controller\IndexController@index',
			"method" => ["GET", "POST"],
		],
	"/" => [
			"method" => ["GET"],
			"controller" => 'App\Controller\IndexController@create',
		],
	"/vr_admin/public" => [
			"method" => ["GET"],
			"controller" => 'App\Controller\IndexController@create',
		],

];


