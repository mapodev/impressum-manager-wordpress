<?php
/**
 * Created by PhpStorm.
 * User: C4
 * Date: 17.06.2015
 * Time: 12:26
 */

class Impressum_Editor {

	public static function get_impressum(){

		$impressum_configured = true;
		$impressum_imported = true;

		if($impressum_configured==true) {
			$impressum = new Impressum();
		}elseif($impressum_imported==true){

		}else{

		}
		return $impressum->get_whole_impressum();
	}

}