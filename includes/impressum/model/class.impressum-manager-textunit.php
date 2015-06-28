<?php

class Impressum_Manager_Textunit extends Impressum_Manager_AImpressum{

	private $shortcode;
	private $name;
	private $text;

	function __construct($shortcode, $name, $text){
		$this->shortcode = $shortcode;
		$this->name = $name;
		$this->text = $text;
	}

	function add(Impressum_Manager_AImpressum $unit){}
	function remove(Impressum_Manager_AImpressum $unit){}

	function draw(){
		return $this->text;
	}
	protected function getImpressum(){}

	//public function getIterator()
	//{
	//	return new Impressum_Manager_Impressum_Iterator( $this );
	//}

	function get_shortcode(){
		return $this->shortcode;
	}

	function get_name(){
		return $this->name;
	}

}