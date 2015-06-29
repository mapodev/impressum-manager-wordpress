<?php

class Impressum_Manager_Text extends Impressum_Manager_AImpressum{

	private $text;

	function __construct($text){
		$this->text = $text;
	}

	function add(Impressum_Manager_AImpressum $unit){}

	function draw(){
		return $this->text;
	}

	function getImpressum(){}

	function get_shortcode(){
		return "";
	}

	function get_name(){
		return $this->name;
	}

	function get_components(){
		return $this;
	}

	function is_empty(){
		return empty($this->text);
	}
}