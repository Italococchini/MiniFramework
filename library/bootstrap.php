<?php namespace Library;
	
class bootstrap{
	
	public static function load(){
		$request = array();
    	$request['controller'] = "Index";
    	$request['action'] = "index";
	    if( $_SERVER['REQUEST_URI'] !== '/'){
		    
		    $arr = explode("/", $_SERVER['REQUEST_URI']);
		    unset($arr[0]);

	    	$request['controller'] = ( isset($arr[1]) && !empty($arr[1]) )? $arr[1] : 'index' ;
	    	unset($arr[1]);
	    	$request['action'] = ( isset($arr[2]) && !empty($arr[2]) )? $arr[2] : 'index' ;
	    	unset($arr[2]);

	    	for ($i=3; $i <= count($arr)+3; $i++ ) {
	    		if( !empty($arr[$i]) ){
		    		$request['param'][$arr[$i]] = $arr[++$i];
	    		}
	    	}
	    }
	    return $request;
	}
	
	public static function run( $param = array() ){
		$controller = ucfirst($param['controller'])."Controller";
		$path = APPLICATION_PATH."/app/controller/{$controller}.php";
		if( file_exists( $path ) ){
			require_once $path;
			$class = new $controller;
			$method = get_class_methods( $class );
			if( $method ){
				if( in_array($param['action'], $method) ){
					print_r( $class->$param['action']( $param ) );
					return '200';
				}
			}			
		}
		require_once APPLICATION_PATH . "/app/view/error/404.php";
	}
	
}	
	
	
