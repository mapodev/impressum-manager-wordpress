<?php



abstract class Impressum_Manager_AImpressum {

	abstract function add(Impressum_Manager_AImpressum $unit);
	abstract function draw();

	abstract function get_shortcode();

	abstract function get_name();

	abstract function get_components();

	protected abstract function getImpressum();

}