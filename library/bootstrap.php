<?php namespace Library;
	
class bootstrap{
	

	static function router( $url, $method ) { 

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
			    		"method" => $r["method"],
			    		"controller" => $r["controller"],
			    		"param" => $parameters,
			    	];
		    }
		}

		return $result;
	}

	public static function load($router){

		// Parametros de REQUEST
		$method = $_SERVER['REQUEST_METHOD'];
		//$uri = str_replace("?".$_SERVER['QUERY_STRING'], '', $_SERVER['REQUEST_URI']);  
		$param = $_REQUEST;

		$ruta = self::router( $router, $method );

		// Controlador y Accion
		$handler = (!empty($ruta))? $ruta : [] ;    	


		// Parametros de Accion
		$data = $handler['param'];
		if(count($param)>0){
			$data = array_merge($param, $handler['param']); 
		}
		// Parametros de Accion
		$request = [];
		$action = [];
		if($handler){
    			$action = explode('@', $handler["controller"]);
    			$request = [
	    		'class' => $action[0],
	   	    	'action' => $action[1],
	   	    	'request' => $param,
	   	    	'data' => $data,
	   	    	'method' => $handler['method'],
	   	    	'ruta' => $handler['ruta'],
	   	    ];
    	}
   	    return $request;

	}
	
	public static function run( $request = array() ){
		if(!empty($request)){
			$class = new $request['class']; // Controlador
			$method = get_class_methods( $class ); 
			if( $method ){
				if( in_array($request['action'], $method) ){ 
					print_r( $class->$request['action']( $request ) );
					return 200;
				}
			}			
		}
		require_once APPLICATION_PATH . "/app/view/error/404.php";
		return 404;
	}
}	
	
	
