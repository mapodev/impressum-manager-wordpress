<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


define( ADDRESS_HEADER, 'address_header' );
define( ADRESS_CONTACT, 'address_contact' );
define( ADDRESS_TELEPHONE, 'address_telephone' );
define( ADDRESS_TELEFAX, 'address_telefax' );
define( ADDRESS_EMAIL, 'address_email' );

define( REGISTER_HEADER, 'register_header' );
define( REGISTER_ENTRY, 'register_entry' );
define( REGISTER_NUMBER, 'register_number' );
define( REGISTER_CHAMBER, 'register_chamber' );

define( VAT, 'vat' );
define( CONTROL_CHAMBER, 'control_chamber' );
define( IMAGE_SOURCES, 'image_sources' );

// authorized persons
define( REPRESENTED_BY, 'represented_by' );
// TODO: typo responsible_person!
define( RESPONSIBLE_PERSON, 'responsibile_person' );

define( DISCLAIMER, 'disclaimer' );

define( POLICY_HEADER, 'policy_header' );
define( POLICY_GENERAL, 'policy_general' );
define( POLICY_FACEBOOK, 'policy_facebook' );
define( POLICY_ANALYTICS, 'policy_analytics' );
define( POLICY_ADSENSE, 'policy_adsense' );
define( POLICY_GOOGLE_PLUS, 'policy_google_plus' );
define( POLICY_TWITTER, 'policy_twitter' );
define( POLICY_END, 'policy_end' );

class Impressum {

	private static $_format_contact;
	private static $_format_contact_telephone;
	private static $_format_contact_telefax;
	private static $_format_contact_email;
	private static $_format_register;
	private static $_format_register_registered_in;
	private static $_format_register_registernr;
	private static $_format_register_chamber;
	private static $_format_vat;
	private static $_format_office;
	private static $_format_image_soruce;
	private static $_format_journalistic_content;
	private static $_disclaimer;
	private static $_privacy_policy_head;
	private static $_privacy_policy_general;
	private static $_privacy_policy_facebook;
	private static $_privacy_policy_analytics;
	private static $_privacy_policy_adsense;
	private static $_privacy_policy_plus;
	private static $_privacy_policy_twitter;
	private static $_privacy_policy_end;
	private static $_source;
	private static $_plugin_by;

	function __construct() {

		self::$_format_contact                = "";
		self::$_format_contact_telephone      = "";
		self::$_format_contact_telefax        = "";
		self::$_format_contact_email          = "";
		self::$_format_register               = "";
		self::$_format_register_registered_in = "";
		self::$_format_register_registernr    = "";
		self::$_format_register_chamber       = "";
		self::$_format_vat                    = "";
		self::$_format_office                 = "";
		self::$_format_image_soruce           = "";
		self::$_format_journalistic_content   = "";
		self::$_disclaimer                    = "";
		self::$_privacy_policy_head           = "";
		self::$_privacy_policy_general        = "";
		self::$_privacy_policy_facebook       = "";
		self::$_privacy_policy_analytics      = "";
		self::$_privacy_policy_adsense        = "";
		self::$_privacy_policy_plus           = "";
		self::$_privacy_policy_twitter        = "";
		self::$_privacy_policy_end            = "";

		self::$_source    = __( "<p>Quelle: <em><a rel=\"nofollow\" href=\"http://www.e-recht24.de/impressum-generator.html\">http://www.e-recht24.de</a></em></p>", SLUG );
		self::$_plugin_by = __( "<p>Plugin von <a href=\"http://www.impressum-manager.com\">Impressum Manager</a></p>", SLUG );
	}

	public function get_whole_impressum() {
		$impressum = "";

		$impressum = $this->get_address();

		$impressum .= $this->get_contact();

		$impressum .= $this->get_authorized_person();

		$impressum .= $this->get_register();

		$impressum .= $this->get_vat();

		$impressum .= $this->get_responsible_person();

		$impressum .= $this->get_credits();

		$impressum .= $this->get_disclaimer();

		$impressum .= $this->get_privacy_policy();

		$impressum .= $this->get_extra_field();

		$impressum .= self::$_source;

		$impressum .= self::$_plugin_by;

		return $impressum;
	}

	public function get_impressum() {
		return self::get_whole_impressum();
	}

	/*
	public function get_contact() {
		$result = "";

		$result = $this->get_address();

		$result .= $this->contact();

		return $result;
	}

	public function get_disclaimer() {
		$result = "";

		return $result;
	}

	public function get_privacy_policy() {

	}
	*/

	private function get_address() {
		$result        = "";
		$name          = get_option( "impressum_manager_name_company" );
		$address       = get_option( "impressum_manager_address" );
		$address_extra = get_option( "impressum_manager_address_extra" );
		$zip           = get_option( "impressum_manager_place" );
		$place         = get_option( "impressum_manager_zip" );

		if ( ! empty( $name ) ) {
			$result .= $name . "<br>";
		}
		if ( ! empty( $address ) ) {
			$result .= $address . "<br>";
		}
		if ( ! empty( $address_extra ) ) {
			$result .= $address_extra . "<br>";
		}
		if ( ! empty( $zip ) ) {
			$result .= $zip . "<br>";
		}
		if ( ! empty( $place ) ) {
			$result .= $place . "<br>";
		}

		return $result;
	}

	private function get_contact() {
		$result = "";
		$telephone = get_option( "impressum_manager_phone" );
		$fax       = get_option( "impressum_manager_fax" );
		$email     = get_option( "impressum_manager_email" );

		if ( ! empty( $telephone ) ) {
			$result .= str_replace( "%s", $telephone, Impressum_Manager_Admin::get_db_content( ADDRESS_TELEPHONE ) ) . "<br>";
		}
		if ( ! empty( $fax ) ) {
			$result .= str_replace( "%s", $fax, Impressum_Manager_Admin::get_db_content( ADDRESS_TELEFAX ) ) . "<br>";
		}

		if ( ! empty( $email ) && get_option( "impressum_manager_show_email_as_image" ) == "on" ) {
			$email = sprintf( "<img src='" . plugin_dir_url( __FILE__ ) . "../includes/email-as-image.php?text=" . $email . "'>" );
		}

		if ( ! empty( $email ) ) {
			$result .= str_replace( "%s", $email, Impressum_Manager_Admin::get_db_content( ADDRESS_EMAIL ) ) . "<br>";
		}

		if ( strlen( $result ) > 0 ) {
			$result = Impressum_Manager_Admin::get_db_content( ADDRESS_HEADER ) . Impressum_Manager_Admin::get_db_content( ADRESS_CONTACT ) . $result;
		}

		return $result;
	}

	private function get_register() {

		$register   = get_option( "impressum_manager_register" );
		$registernr = get_option( "impressum_manager_registenr" );
		$chamber    = get_option( "impressum_manager_chamber" );

		switch ( $register ) {
			case 1:
				$register_registered_in = __( "Kein Register", SLUG );
				break;
			case 2:
				$register_registered_in = __( "Genossenschaftsregister", SLUG );
				break;
			case 3:
				$register_registered_in = __( "Handelsregister", SLUG );
				break;
			case 4:
				$register_registered_in = __( "Partnerschaftsregister", SLUG );
				break;
			case 5:
				$register_registered_in = __( "Vereinsregister", SLUG );
				break;
			default:
				$register_registered_in = __( "Kein Register", SLUG );
				break;
		}

		if ( ( empty( $register ) || $register == 1 ) && empty( $registernr ) && empty( $register_chamber ) ) {
			return "";
		}

		$result = self::$_format_register;
		$result .= "<p>";

		if ( ! empty( $register ) && $register != 1 ) {
			$result .= sprintf( self::$_format_register_registered_in, $register_registered_in );
		}
		if ( ! empty( $registernr ) ) {
			$result .= sprintf( self::$_format_register_registernr, $registernr );
		}
		if ( ! empty( $register_chamber ) ) {
			$result .= sprintf( self::$_format_register_chamber, $register_chamber );
		}
		$result .= "</p>";

		return $result;
	}

	private function get_credits() {

		$image_source = get_option( "impressum_manager_image_source" );

		$creds = array();
		$i     = 0;

		$post_types = get_post_types( '', 'names' );

		foreach ( $post_types as $post_type ) {
			$args = array(
				'post_type'   => $post_type,
				'numberposts' => - 1,
				'post_status' => null
			);

			$posts = get_posts( $args );

			foreach ( $posts as $post ) {
				$args = array(
					'post_type'   => 'attachment',
					'numberposts' => - 1,
					'post_status' => null,
					'post_parent' => $post->ID
				);

				$attachments = get_posts( $args );
				if ( $attachments ) {
					foreach ( $attachments as $attachment ) {
						$creds[ $i ++ ] = trim( strip_tags( get_post_meta( $attachment->ID, 'impressum_manager_image_credential', true ) ) );
					}
				}
			}
		}

		$result = self::$_format_image_soruce;
		$creds  = array_unique( $creds );
		foreach ( $creds as $credit ) {
			$result .= $credit . "<br>";
		}

		if ( $image_source !== false ) {
			$result .= nl2br( $image_source );
		}

		return $result;
	}

	private function get_authorized_person() {

		$result = "";

		$authorized_person = nl2br(get_option( "impressum_manager_authorized_person" ));

		if(!empty($authorized_person))
		{
			$result .= Impressum_Manager_Admin::get_db_content( REPRESENTED_BY ) . $authorized_person . "<br>";
		}

		return $result;
	}

	// journalistics
	private function get_responsible_person() {

		$result = "";

		$responsible_person = nl2br(get_option( "impressum_manager_responsible_persons" ));

		if(!empty($responsible_person))
		{
			$result .= Impressum_Manager_Admin::get_db_content( RESPONSIBLE_PERSON ) .$responsible_person . "<br>";
		}

		return $result;
	}

	private function get_vat() {

		$vat        = get_option( "impressum_manager_vat" );
		$profession = get_option( "impressum_manager_regulated_profession" );
		$state      = get_option( "impressum_manager_state" );
		$rules      = get_option( "impressum_manager_state_rules" );
		$chamber    = get_option( "impressum_manager_chamber" );

		$result = "";
		if ( ! empty( $vat ) ) {
			$result .= sprintf( self::$_format_vat, $vat );
		}
		if ( strlen( get_option( "impressum_manager_regulated_profession_checked" ) ) > 0 ) {
			if ( ! empty( $profession ) ) {
				$result .= __( "Berufsbezeichnung:", SLUG ) . " " . $profession . "<br>";
			}
			if ( ! empty( $chamber ) ) {
				$result .= __( "Zuständige Kammer:", SLUG ) . " " . $chamber . "<br>";
			}
			if ( ! empty( $state ) ) {
				$result .= __( "Verliehen durch:", SLUG ) . " " . $state . "<br>";
			}
			if ( ! empty( $rules ) ) {
				$result .= __( "Es gelten folgende berufsrechtliche Regelungen:", SLUG ) . " " . $rules . "<br>";
			}
		}

		return $result;
	}

	private function get_disclaimer() {
		$result = "";

		if ( get_option( "impressum_manager_disclaimer" ) == true ) {
			$result .= Impressum_Manager_Admin::get_db_content( DISCLAIMER );
		}

		return $result;
	}

	private function get_privacy_policy() {

		$result = "";

		if ( strlen( get_option( "impressum_manager_general_privacy_policy" ) ) > 0 ) {
			$result .= Impressum_Manager_Admin::get_db_content( POLICY_GENERAL );
		}
		if ( strlen( get_option( "impressum_manager_policy_facebook" ) ) > 0 ) {
			$result .= Impressum_Manager_Admin::get_db_content( POLICY_FACEBOOK );
		}
		if ( strlen( get_option( "impressum_manager_policy_google_analytics" ) ) > 0 ) {
			$result .= Impressum_Manager_Admin::get_db_content( POLICY_ANALYTICS );
		}
		if ( strlen( get_option( "impressum_manager_policy_google_adsense" ) ) > 0 ) {
			$result .= Impressum_Manager_Admin::get_db_content( POLICY_ADSENSE );
		}
		if ( strlen( get_option( "impressum_manager_policy_google_plus" ) ) > 0 ) {
			$result .= Impressum_Manager_Admin::get_db_content( POLICY_GOOGLE_PLUS );
		}
		if ( strlen( get_option( "impressum_manager_policy_twitter" ) ) > 0 ) {
			$result .= Impressum_Manager_Admin::get_db_content( POLICY_TWITTER );
		}

		if ( strlen( $result ) > 0 ) {
			$result = Impressum_Manager_Admin::get_db_content( POLICY_HEADER ) . $result . Impressum_Manager_Admin::get_db_content( POLICY_END );
		}

		return $result;
	}

	private function get_extra_field() {
		$result = "";

		$extra_field = get_option( "impressum_manager_extra_field" );
		if ( ! empty( $extra_field ) ) {
			$result .= $extra_field;
		}

		return $result;
	}
}
