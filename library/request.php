<?php namespace Library;

Class request{

	public $argument = [];

	public function get( $name = '', $echo = true ){
		$result = '';
		try{
			if( !empty($this->argument) ){
				if(array_key_exists($name, $this->argument)){
					$result = $this->argument[$name];
				}
			}
		}catch(Exception $e){
			$result = '';
		}
		if($echo){
			print_r( $result );
		}else{
			return $result;		
		}
	}
}