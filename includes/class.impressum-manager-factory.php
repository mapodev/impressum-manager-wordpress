<?php

class Impressum_Manager_Factory {

	/**
	 * Creates a string of an impressum with regards to all settings.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function create_impressum() {

		$impressum = new Impressum_Manager_Impressum();

		return $impressum->get_impressum();

	}

	/**
	 * Creates a string of all privacy policies, which are activated in the settings.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function create_privacy_policy() {
		$im = new Impressum_Manager_Impressum();

		return $im->get_privacy_policy();
	}

	/**
	 * Creates a string with disclaimer information.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function create_disclaimer() {
		$im = new Impressum_Manager_Impressum();

		return $im->get_disclaimer();
	}

	/**
	 * Creates a string with contact information in regards to the settings.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function create_contact() {
		$im = new Impressum_Manager_Impressum();

		return $im->get_contact();
	}

	/**
	 * Creates a string with all image source information.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function create_image_sources() {
		$im = new Impressum_Manager_Impressum();

		return $im->get_image_sources();
	}


}
