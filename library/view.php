<?php namespace Library;

/**
* 
*/
class view 
{
	public static function load($view="", $argument= array() )
	{
		$path = APPLICATION_PATH."/app/view/".ucfirst($view).".php";
		if( file_exists( $path ) ){
			if( !empty($argument) ){
				extract($argument);
			}
			ob_start();
			include_once $path;
			$html = ob_get_clean();
			return $html;
		}
		return '404';


	}
}