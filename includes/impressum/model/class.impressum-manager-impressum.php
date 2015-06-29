<?php

class Impressum_Manager_Impressum extends Impressum_Manager_AImpressum {

	private $shortcode;
	private $name;
	private $units;

	function __construct( $shortcode, $name) {
		$this->units     = array();
		$this->shortcode = $shortcode;
		$this->name      = $name;
	}

	function add( Impressum_Manager_AImpressum $unit ) {
		array_push( $this->units, $unit );
	}


	function getImpressum() {
		return $this;
	}

	function draw() {
		$result = "";

		foreach ( $this->units as $unit ) {
			$result .= $unit->draw();
		}

		return $result;
	}

	function get_components() {
		$result = array();
		array_push( $result, $this );

		foreach ( $this->units as $unit ) {
			if ( $unit instanceof Impressum_Manager_Textunit || $unit instanceof Impressum_Manager_Textunit ) {
				array_push( $result, $unit->get_components() );
			} elseif ( $unit instanceof Impressum_Manager_Impressum ) {
				$result = array_merge( $result, $unit->get_components() );
			} else {

			}
		}

		return $result;
	}

	function get_name() {
		return $this->name;
	}

	function get_shortcode() {
		return $this->shortcode;
	}

	function is_empty() {
		return !$this->has_content();
	}


	function has_content() {
		$result = false;
		foreach ( $this->units as $unit ) {
			if($unit->has_content()){
				return true;
			}
		}
		return false;
	}
}