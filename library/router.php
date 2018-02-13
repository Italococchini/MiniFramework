<?php namespace Library;

Class router{

	public $router = [];

	public static function load(){
		GLOBAL $url;
		require_once APPLICATION_PATH . "/app/routes.php";
		return $url;
 	}

	public static function collection(){		
		$url = self::load();
		return self::match( $url );
	}

	public static function match( $url ) {	
    	$result = [];
	    $route = $_SERVER['REQUEST_URI'];
	    if (strpos($route, '?')) {
	        $route = strstr($route, '?', true);
	    }

	    foreach($url as $k=>$r){
	 	    $urlRule = preg_replace('/:([^\/]+)/', '(?<\1>[^/]+)', $k);
	    	$urlRule = str_replace('/', '\/', $urlRule);
		    preg_match_all('/:([^\/]+)/', $k, $parameterNames);
		    $parameters = [];
		    if (preg_match('/^' . $urlRule . '\/*$/s', $route, $matches)) {
			        $parameters = array_intersect_key($matches, array_flip($parameterNames[1]));
			    	$result = [
			    		"ruta" => $k,
			    		"controller" => $r,
			    		"param" => $parameters,
			    	];
		    }
		}
		return $result;
	}




	public function any( $route, $controller ){
		// return self::router[$route]['ANY'] = $controller;
	}
	public function get( $route, $controller ){
		// return self::router[$route]['GET'] = $controller;
	}
	public function post( $route, $controller ){
		// return self::router[$route]['POST'] = $controller;
	}
	public function del( $route, $controller ){
		// return self::router[$route]['DEL'] = $controller;
	}
	public function put( $route, $controller ){
		// return self::router[$route]['PUT'] = $controller;
	}
}