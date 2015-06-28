<?php

require_once(IMPRESSUM_MANAGER_PLUGIN_DIR . 'includes/impressum/model/class.impressum-manager-aimpressum.php');
require_once(IMPRESSUM_MANAGER_PLUGIN_DIR . 'includes/impressum/model/class.impressum-manager-impressum.php');
require_once(IMPRESSUM_MANAGER_PLUGIN_DIR . 'includes/impressum/model/class.impressum-manager-textunit.php');
require_once(IMPRESSUM_MANAGER_PLUGIN_DIR . 'includes/impressum/class.impressum-manager-factory.php');

require_once(IMPRESSUM_MANAGER_PLUGIN_DIR . 'includes/impressum/iterator/class.impressum-manager-impressum-iterator.php');
require_once(IMPRESSUM_MANAGER_PLUGIN_DIR . 'includes/impressum/iterator/class.impressum-manager-null-iterator.php');
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
		$impressum = Impressum_Manager_Factory::create_generated_impressum();

		return $impressum;
	}

}
