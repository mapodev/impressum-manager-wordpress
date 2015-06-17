<?php
/**
 * Created by PhpStorm.
 * User: C4
 * Date: 17.06.2015
 * Time: 12:26
 */

class Impressum_Manager_Factory {

	public static function create_impressum(){

		$impressum_configured = true;
		$impressum_imported = true;

		if($impressum_configured==true) {
			$impressum = new Impressum_Manager_Impressum();
		}elseif($impressum_imported==true){

		}else{

		}
		return $impressum->get_impressum();

	}

	public static function create_privacy_policy(){
		$im = new Impressum_Manager_Impressum();
		return $im->get_privacy_policy();
	}

	public static function create_disclaimer(){
		$im = new Impressum_Manager_Impressum();
		return $im->get_disclaimer();
	}

	public static function create_contact(){
		$im = new Impressum_Manager_Impressum();
		return $im->get_contact();
	}

	public static function create_image_sources(){
		$im = new Impressum_Manager_Impressum();
		return $im->get_image_sources();
	}


}