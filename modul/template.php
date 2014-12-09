<?php

/* Ayhan Kuru 
   Template Creator
   02.12.2014
   0.0.1
*/

class Template {
	
	private $cache_header;
	private $cache_footer; 
	public $variables;
	private $uriarray;
	
	public function __construct($header_path,$footer_path){
		if(!$header_path && !$footer_path){
			throw new Exception("Header ve Footer dosyaları belirtilmeli");
		}else{
			$this->cache_header =$header_path;
			$this->cache_footer =$footer_path;

		}
	}

	public function  uri($uri){
		$this->uriarray = array("uri" => $uri);

	}
	private function ren_header(){
		$this->variables = array_merge($this->variables,$this->uriarray);
		if($this->cache_header){
			 $content = file_get_contents($this->cache_header); 

			 if($this->variables){
			 	foreach($this->variables as $key => $value){
			    $content = str_replace('{'.$key.'}', $value, $content);
				}
			 
			 }
			 echo $content;	 
		}
	}

	private function ren_footer(){

		if($this->cache_footer){
			$content = file_get_contents($this->cache_footer); 
			echo $content;
		}
	}

	public function render($fn){



		$this->ren_header();
		$fn();	
		$this->ren_footer();  
 

	}
}


?>