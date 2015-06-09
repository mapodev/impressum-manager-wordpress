<?php


class Impressum_Manager_Admin {

	private static $initiated = false;

	public static function init() {
		if ( ! self::$initiated ) {
			self::init_hooks();
		}

	}

	public static function init_hooks() {

		self::$initiated = true;
		add_action('admin_notices',array( 'Impressum_Manager_Admin', 'installation_notice'));


	}

	public static function installation_notice()
	{
		$request = $_SERVER['REQUEST_URI'];
		if (strpos($request, Impressum_Manager_Config::get_instance()->get_slug()) !== false) {
			// indside impressum
		} else {
			if (get_option("impressum_manager_notice") === false && get_option("impressum_manager_name_company") === false) {
				$class = "error";
				$message = sprintf(__("Dein Wordpress Impressum ist nicht eingerichtet! %s, um deine Webseite rechtssicher zu machen."), "<a href='options-general.php?page=" . Impressum_Manager_Config::get_instance()->get_slug() . "&step=1&&setup=true&dismiss=true'>Lege jetzt dein Impressum an</a>");
				echo "<div class=\"$class\"> <p>$message</p></div>";
			}
		}
	}





}


?>