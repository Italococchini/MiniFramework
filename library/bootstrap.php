<?php namespace Library;
	
class bootstrap {
	
	public static function load( $server ){
		
		// Rutas
		$ruta = Router::collection();

		// Controlador y Accion
    	$handler = (!empty($ruta))? $ruta : [] ;    	

		// Parametros
    	$data = $handler['param'];
    	if( !empty($_REQUEST) ){
    		$data = array_merge($data, $_REQUEST);
    	}


    	// Request
    	$request = [];
    	if($handler){
    		if( in_array( strtoupper($server['REQUEST_METHOD']), $handler['method']) ){			
	    		$action = explode('@', $handler["controller"]);
	    		$request = [
		    		'class' => $action[0],
		   	    	'action' => $action[1],
		   	    	'data' => $data,
		   	    	'method' => $handler['method'],
		   	    	'ruta' => $handler['ruta'],
		   	    ];
    		}
    	}
   	    return $request;
	}
	
	public static function run( $server ){
		$request = self::load( $server );

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
	
	
