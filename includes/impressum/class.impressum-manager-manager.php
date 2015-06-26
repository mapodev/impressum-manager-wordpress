<?php

class Impressum_Manager_Manager {

	static private $instance = null;

	static public function getInstance() {
		if ( null === self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	private function __construct() {
	}

	private function __clone() {
	}

	public function get_impressum() {
		$impressum = Impressum_Manager_Factory::create_impressum();

		return $impressum;
	}

}
