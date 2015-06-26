<?php

class Impressum_Manager_Textunit extends Impressum_Manager_AImpressum {

	private $text;

	function __construct($text){
		$this->text = $text;
	}

	function add(Impressum_Manager_AImpressum $unit){}
	function remove(Impressum_Manager_AImpressum $unit){}
	function get($int){}
	function draw(){
		return $this->text;
	}
	protected function getImpressum(){}

}