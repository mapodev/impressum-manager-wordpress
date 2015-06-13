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
define( REPRESENTED_BY, 'represented_by' );
define( RESPONSIBLE_PERSON, 'responsible_person' );
define( DISCLAIMER, 'disclaimer' );
define( POLICY_HEADER, 'policy_header' );
define( POLICY_GENERAL, 'policy_general' );
define( POLICY_FACEBOOK, 'policy_facebook' );
define( POLICY_ANALYTICS, 'policy_analytics' );
define( POLICY_ADSENSE, 'policy_adsense' );
define( POLICY_GOOGLE_PLUS, 'policy_google_plus' );
define( POLICY_TWITTER, 'policy_twitter' );
define( POLICY_END, 'policy_end' );

class ImpressumManager {


	private static $_format_representant;
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
	private static $_format_authorized_person;
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
		self::$_format_authorized_person      = "";
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

	public function content() {
		$impressum = "";

		$impressum = $this->address();

		$impressum .= $this->contact();

		// authorized persons
		$authorized_person = get_option( "impressum_manager_authorized_person" );
		if ( ! empty( $authorized_person ) ) {
			$impressum .= $this->authorized_person( $authorized_person );
		}

		$impressum .= $this->register();

		$impressum .= $this->vat();

		if ( ! empty( $responsible_person_for_content ) ) {
			$impressum .= $this->journalistic( $responsible_person_for_content );
		}

		$impressum .= $this->credits();

		$disclaimer = get_option( "impressum_manager_disclaimer" );
		if ( $disclaimer ) {
			$impressum .= self::$_disclaimer;
		}

		$impressum .= $this->privacy_policy();

		$extra_field = get_option( "impressum_manager_extra_field" );
		if ( ! empty( $extra_field ) ) {
			$impressum .= $extra_field;
		}

		$impressum .= self::$_source;
		$impressum .= self::$_plugin_by;

		return $impressum;
	}

	/* Teilbereiche:
			Impressum (Kontakt)
			Disclaimer (Haftungsausschluss)
			Privacy_policy (Datenschutz)
	*/

	public function get_impressum(){
		return self::content();
	}

	public function get_contact(){
		$result = "";

		$result = $this->address();

		$result .= $this->contact();

		return $result;
	}

	public function get_disclaimer(){
		$result = "";

		return $result;
	}

	public function get_privacy_policy(){
		
	}

	private function address() {
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


	private function contact() {
		$telefon = get_option( "impressum_manager_phone" );
		$fax     = get_option( "impressum_manager_fax" );
		$email   = get_option( "impressum_manager_email" );

		$result = "";
		$result .= "<table><tbody>";
		if ( ! empty( $telefon ) ) {
			$result .= sprintf( self::$_format_contact_telephone, $telefon );
		}
		if ( ! empty( $fax ) ) {
			$result .= sprintf( self::$_format_contact_telefax, $fax );
		}

		if ( $email && get_option( "impressum_manager_show_email_as_image" ) == "on" ) {
			$image = "<img src='" . plugin_dir_url( __FILE__ ) . "../includes/email-as-image.php?text=" . $email . "'>";
		} else if ( $email ) {
			$image = $email;
		}

		if ( ! empty( $email ) ) {
			$result .= sprintf( self::$_format_contact_email, $image );
		}
		$result .= "</tbody></table>";

		return $result;
	}

	private function register() {

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

	private function credits() {

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

	private function authorized_person( $person ) {
		$result = self::$_format_authorized_person;
		if ( ! empty( $person ) ) {
			$result .= nl2br( $person );
		}

		return $result;
	}

	private function vat() {

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

	private function journalistic() {
		$responsible_person_for_content = get_option( "impressum_manager_responsible_persons" );
		$result                         = self::$_format_journalistic_content;
		if ( ! empty( $responsible_person_for_content ) ) {
			$result .= nl2br( $responsible_person_for_content );
		}

		return $result;
	}

	private function privacy_policy() {

		$policy_general   = get_option( "impressum_manager_general_privacy_policy" );
		$policy_facebook  = get_option( "impressum_manager_policy_facebook" );
		$policy_analytics = get_option( "impressum_manager_policy_google_analytics" );
		$policy_adsense   = get_option( "impressum_manager_policy_google_adsense" );
		$policy_plus      = get_option( "impressum_manager_policy_google_plus" );
		$policy_twitter   = get_option( "impressum_manager_policy_twitter" );

		$result = self::$_privacy_policy_head;
		if ( strlen( $policy_general ) > 0 ) {
			$result .= self::$_privacy_policy_general;
		}
		if ( strlen( $policy_facebook ) > 0 ) {
			$result .= self::$_privacy_policy_facebook;
		}
		if ( strlen( $policy_analytics ) > 0 ) {
			$result .= self::$_privacy_policy_analytics;
		}
		if ( strlen( $policy_adsense ) > 0 ) {
			$result .= self::$_privacy_policy_adsense;
		}
		if ( strlen( $policy_plus ) > 0 ) {
			$result .= self::$_privacy_policy_plus;
		}
		if ( strlen( $policy_twitter ) > 0 ) {
			$result .= self::$_privacy_policy_twitter;
		}
		$result .= self::$_privacy_policy_end;

		return $result;
	}
}
