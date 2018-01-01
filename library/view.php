<?php namespace Library;

use Library\Request as Input;
use Library\View;

class view 
{
	public $section_collection;

	public function start_section(){
		ob_start();
	}
	
	public function end_section($name){
		$content = ob_get_clean();
		$this->section_collection[$name] = $content;
	}

	public static function load($view="", $argument= array() )
	{
		$html = '';
		$view_path   = APPLICATION_PATH."/app/view/".ucfirst($view).".php";
		if( file_exists( $view_path ) )
		{
			// ----------------------------
			// Parametros Vista
			// ----------------------------
			$layout = 'layout';
			$input = new Input();
			$input->argument = $argument['data'];
			// ----------------------------
			// Plantilla Vista
			// ----------------------------
			$view = new View;
			include_once $view_path;
			ob_clean();
			// ----------------------------
			// Seccion de la Vista
			// ----------------------------
			extract($view->section_collection);
			// ----------------------------
			// Plantilla Layout
			// ----------------------------
			$layout_path = APPLICATION_PATH."/app/view/layout/".ucfirst($layout).".php";
			if( file_exists( $layout_path ) ){
				ob_start();
				include_once $layout_path;
				$html = ob_get_clean();
			}
		}
		// Resultado HTML
		return $html;
	}
}