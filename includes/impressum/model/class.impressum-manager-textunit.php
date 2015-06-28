<?php

class Impressum_Manager_Textunit extends Impressum_Manager_AImpressum {

	private $text;
	private $id;

	function __construct($id, $text){
		$this->id = $id;
		$this->text = $text;
	}

	function add(Impressum_Manager_AImpressum $unit){}
	function remove(Impressum_Manager_AImpressum $unit){}

	function draw(){
		return $this->text;
	}
	protected function getImpressum(){}

}