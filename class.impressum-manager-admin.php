<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class Impressum_Manager_Admin {

	public static $_countries = array(
		"DE" => "Germany",
		"GB" => "United Kingdom",
		"US" => "United States",
		"AF" => "Afghanistan",
		"AL" => "Albania",
		"DZ" => "Algeria",
		"AS" => "American Samoa",
		"AD" => "Andorra",
		"AO" => "Angola",
		"AI" => "Anguilla",
		"AQ" => "Antarctica",
		"AG" => "Antigua And Barbuda",
		"AR" => "Argentina",
		"AM" => "Armenia",
		"AW" => "Aruba",
		"AU" => "Australia",
		"AT" => "Austria",
		"AZ" => "Azerbaijan",
		"BS" => "Bahamas",
		"BH" => "Bahrain",
		"BD" => "Bangladesh",
		"BB" => "Barbados",
		"BY" => "Belarus",
		"BE" => "Belgium",
		"BZ" => "Belize",
		"BJ" => "Benin",
		"BM" => "Bermuda",
		"BT" => "Bhutan",
		"BO" => "Bolivia",
		"BA" => "Bosnia And Herzegowina",
		"BW" => "Botswana",
		"BV" => "Bouvet Island",
		"BR" => "Brazil",
		"IO" => "British Indian Ocean Territory",
		"BN" => "Brunei Darussalam",
		"BG" => "Bulgaria",
		"BF" => "Burkina Faso",
		"BI" => "Burundi",
		"KH" => "Cambodia",
		"CM" => "Cameroon",
		"CA" => "Canada",
		"CV" => "Cape Verde",
		"KY" => "Cayman Islands",
		"CF" => "Central African Republic",
		"TD" => "Chad",
		"CL" => "Chile",
		"CN" => "China",
		"CX" => "Christmas Island",
		"CC" => "Cocos (Keeling) Islands",
		"CO" => "Colombia",
		"KM" => "Comoros",
		"CG" => "Congo",
		"CD" => "Congo, The Democratic Republic Of The",
		"CK" => "Cook Islands",
		"CR" => "Costa Rica",
		"CI" => "Cote D'Ivoire",
		"HR" => "Croatia (Local Name: Hrvatska)",
		"CU" => "Cuba",
		"CY" => "Cyprus",
		"CZ" => "Czech Republic",
		"DK" => "Denmark",
		"DJ" => "Djibouti",
		"DM" => "Dominica",
		"DO" => "Dominican Republic",
		"TP" => "East Timor",
		"EC" => "Ecuador",
		"EG" => "Egypt",
		"SV" => "El Salvador",
		"GQ" => "Equatorial Guinea",
		"ER" => "Eritrea",
		"EE" => "Estonia",
		"ET" => "Ethiopia",
		"FK" => "Falkland Islands (Malvinas)",
		"FO" => "Faroe Islands",
		"FJ" => "Fiji",
		"FI" => "Finland",
		"FR" => "France",
		"FX" => "France, Metropolitan",
		"GF" => "French Guiana",
		"PF" => "French Polynesia",
		"TF" => "French Southern Territories",
		"GA" => "Gabon",
		"GM" => "Gambia",
		"GE" => "Georgia",
		"GH" => "Ghana",
		"GI" => "Gibraltar",
		"GR" => "Greece",
		"GL" => "Greenland",
		"GD" => "Grenada",
		"GP" => "Guadeloupe",
		"GU" => "Guam",
		"GT" => "Guatemala",
		"GN" => "Guinea",
		"GW" => "Guinea-Bissau",
		"GY" => "Guyana",
		"HT" => "Haiti",
		"HM" => "Heard And Mc Donald Islands",
		"VA" => "Holy See (Vatican City State)",
		"HN" => "Honduras",
		"HK" => "Hong Kong",
		"HU" => "Hungary",
		"IS" => "Iceland",
		"IN" => "India",
		"ID" => "Indonesia",
		"IR" => "Iran (Islamic Republic Of)",
		"IQ" => "Iraq",
		"IE" => "Ireland",
		"IL" => "Israel",
		"IT" => "Italy",
		"JM" => "Jamaica",
		"JP" => "Japan",
		"JO" => "Jordan",
		"KZ" => "Kazakhstan",
		"KE" => "Kenya",
		"KI" => "Kiribati",
		"KP" => "Korea, Democratic People's Republic Of",
		"KR" => "Korea, Republic Of",
		"KW" => "Kuwait",
		"KG" => "Kyrgyzstan",
		"LA" => "Lao People's Democratic Republic",
		"LV" => "Latvia",
		"LB" => "Lebanon",
		"LS" => "Lesotho",
		"LR" => "Liberia",
		"LY" => "Libyan Arab Jamahiriya",
		"LI" => "Liechtenstein",
		"LT" => "Lithuania",
		"LU" => "Luxembourg",
		"MO" => "Macau",
		"MK" => "Macedonia, Former Yugoslav Republic Of",
		"MG" => "Madagascar",
		"MW" => "Malawi",
		"MY" => "Malaysia",
		"MV" => "Maldives",
		"ML" => "Mali",
		"MT" => "Malta",
		"MH" => "Marshall Islands",
		"MQ" => "Martinique",
		"MR" => "Mauritania",
		"MU" => "Mauritius",
		"YT" => "Mayotte",
		"MX" => "Mexico",
		"FM" => "Micronesia, Federated States Of",
		"MD" => "Moldova, Republic Of",
		"MC" => "Monaco",
		"MN" => "Mongolia",
		"MS" => "Montserrat",
		"MA" => "Morocco",
		"MZ" => "Mozambique",
		"MM" => "Myanmar",
		"NA" => "Namibia",
		"NR" => "Nauru",
		"NP" => "Nepal",
		"NL" => "Netherlands",
		"AN" => "Netherlands Antilles",
		"NC" => "New Caledonia",
		"NZ" => "New Zealand",
		"NI" => "Nicaragua",
		"NE" => "Niger",
		"NG" => "Nigeria",
		"NU" => "Niue",
		"NF" => "Norfolk Island",
		"MP" => "Northern Mariana Islands",
		"NO" => "Norway",
		"OM" => "Oman",
		"PK" => "Pakistan",
		"PW" => "Palau",
		"PA" => "Panama",
		"PG" => "Papua New Guinea",
		"PY" => "Paraguay",
		"PE" => "Peru",
		"PH" => "Philippines",
		"PN" => "Pitcairn",
		"PL" => "Poland",
		"PT" => "Portugal",
		"PR" => "Puerto Rico",
		"QA" => "Qatar",
		"RE" => "Reunion",
		"RO" => "Romania",
		"RU" => "Russian Federation",
		"RW" => "Rwanda",
		"KN" => "Saint Kitts And Nevis",
		"LC" => "Saint Lucia",
		"VC" => "Saint Vincent And The Grenadines",
		"WS" => "Samoa",
		"SM" => "San Marino",
		"ST" => "Sao Tome And Principe",
		"SA" => "Saudi Arabia",
		"SN" => "Senegal",
		"SC" => "Seychelles",
		"SL" => "Sierra Leone",
		"SG" => "Singapore",
		"SK" => "Slovakia (Slovak Republic)",
		"SI" => "Slovenia",
		"SB" => "Solomon Islands",
		"SO" => "Somalia",
		"ZA" => "South Africa",
		"GS" => "South Georgia, South Sandwich Islands",
		"ES" => "Spain",
		"LK" => "Sri Lanka",
		"SH" => "St. Helena",
		"PM" => "St. Pierre And Miquelon",
		"SD" => "Sudan",
		"SR" => "Suriname",
		"SJ" => "Svalbard And Jan Mayen Islands",
		"SZ" => "Swaziland",
		"SE" => "Sweden",
		"CH" => "Switzerland",
		"SY" => "Syrian Arab Republic",
		"TW" => "Taiwan",
		"TJ" => "Tajikistan",
		"TZ" => "Tanzania, United Republic Of",
		"TH" => "Thailand",
		"TG" => "Togo",
		"TK" => "Tokelau",
		"TO" => "Tonga",
		"TT" => "Trinidad And Tobago",
		"TN" => "Tunisia",
		"TR" => "Turkey",
		"TM" => "Turkmenistan",
		"TC" => "Turks And Caicos Islands",
		"TV" => "Tuvalu",
		"UG" => "Uganda",
		"UA" => "Ukraine",
		"AE" => "United Arab Emirates",
		"UM" => "United States Minor Outlying Islands",
		"UY" => "Uruguay",
		"UZ" => "Uzbekistan",
		"VU" => "Vanuatu",
		"VE" => "Venezuela",
		"VN" => "Viet Nam",
		"VG" => "Virgin Islands (British)",
		"VI" => "Virgin Islands (U.S.)",
		"WF" => "Wallis And Futuna Islands",
		"EH" => "Western Sahara",
		"YE" => "Yemen",
		"YU" => "Yugoslavia",
		"ZM" => "Zambia",
		"ZW" => "Zimbabwe"
	);

	public static function init(){
		if ( array_key_exists( "dismiss", $_REQUEST ) ) {
			self::save_option("impressum_manager_notice","dismiss");
		}

		add_action( 'admin_init', array( 'Impressum_Manager_Admin', 'admin_init' ) );
		add_action( 'admin_menu', array( 'Impressum_Manager_Admin', 'add_menu' ) );
		add_action( 'admin_notices', array( 'Impressum_Manager_Admin', 'installation_notice' ) );
		add_action( 'wp_ajax_impressum_manager_delete_options', array( 'Impressum_Manager_Admin', 'delete_callback' ) );
		add_action( 'wp_ajax_impressum_manager_get_impressum_field', array( 'Impressum_Manager_Admin', 'editor_ajax_callback' ) );

	}

	public static function installation_notice() {
		$request = $_SERVER['REQUEST_URI'];
		if ( strpos( $request, SLUG ) !== false ) {
			// indside impressum
		} else {
			if ( get_option( "impressum_manager_notice" ) === false && get_option( "impressum_manager_name_company" ) === false ) {
				$class   = "error";
				$message = sprintf( __( "Dein Wordpress Impressum ist nicht eingerichtet! %s, um deine Webseite rechtssicher zu machen." ), "<a href='options-general.php?page=" . SLUG . "&step=1&&setup=true&dismiss=true'>Lege jetzt dein Impressum an</a>" );
				echo "<div class=\"$class\"> <p>$message</p></div>";
			}
		}
	}

	/**
	 * ajax response for DEV options
	 * TODO: Delete before release to Wordpress
	 */
	public static function delete_callback() {
		echo "OK";
		require_once plugin_dir_path( __FILE__ ) . "uninstall.php";
		die();
	}

	public static function editor_ajax_callback() {
		global $wpdb;

		$table_name = $wpdb->prefix . "impressum_manager_content";

		$key = esc_attr( $_POST['key'] );

		$result = $wpdb->get_var(
			"SELECT impressum_value
              FROM $table_name
              WHERE impressum_key = '$key'" );

		echo $result;

		die();
	}

	public static function admin_init() {
		self::register_settings();
		wp_enqueue_style( 'impressum_manager_style', plugins_url( 'css/impressum-manager.min.css', __FILE__ ) );
		wp_enqueue_script( 'impressum_manager_script', plugins_url( 'js/impressum-manager.min.js', __FILE__ ) );
		wp_enqueue_script( 'jquery' );
        wp_enqueue_script('tiny_mce');
	}

	public static function add_menu() {
		$hook = add_options_page( "Impressum Manager", 'Impressum Manager', 'manage_options', SLUG, array(
			'Impressum_Manager_Admin',
			'show'
		), 99.5 );
		add_action( 'load-' . $hook, array( 'Impressum_Manager_Admin', 'add_help_tab' ) );
	}

	public static function add_help_tab() {
		$screen = get_current_screen();

		$tabs = array(
			array(
				'title'   => 'All About Books',
				'id'      => 'cjr-books-about',
				'content' => '<p>Books are pretty awesome...</p>'
			),
			array(
				'title' => 'More About Books',
				'id'    => 'cjr-books-more'
			)
		);

		foreach ( $tabs as $tab ) {
			$screen->add_help_tab( $tab );
		}

		$screen->set_help_sidebar( '<a href="#">More info!</a>' );
	}

	public static function get_page_url() {

		$url = admin_url( "options-general.php" ) . "?page=" . SLUG;

		return $url;
	}

	public static function show() {

		// comment in/out for start page test
		self::save_option( 'impressum_manager_skip_start', false );

		$skip_start = false;

		if ( isset( $_GET['skip_start'] ) && $_GET['skip_start'] == 'true' || isset( $_GET['tut_finished'] ) && $_GET['tut_finished'] == 'true' ) {
			self::save_option( 'impressum_manager_skip_start', true );
		}

		if ( get_option( 'impressum_manager_skip_start' ) == true || isset( $_GET['skip_start_temp'] ) && $_GET['skip_start_temp'] == 'true') {
			$skip_start = true;
		}

		if ( $skip_start == false ) {
			include( plugin_dir_path( __FILE__ ) . "admin/views/start.php" );
		} elseif ( isset( $_GET['view'] ) && $_GET['view'] == 'tutorial' ) {
			self::display_tutorial_page();
		} elseif ( isset( $_GET['view'] ) && $_GET['view'] == 'config' ) {
			self::display_config_page();
		} else {
			self::display_config_page();
		}
	}

	private static function display_tutorial_page() {

		switch ( @$_GET['step'] ) {
			case 1:
				include( plugin_dir_path( __FILE__ ) . "admin/views/tutorial/page1.php" );
				break;

			case 2:

				if ( array_key_exists( "submit", $_REQUEST ) ) {
					self::save_option( "impressum_manager_person", @$_POST["impressum_manager_person"] );
					self::save_option( "impressum_manager_form_of_organization", @$_POST["impressum_manager_form_of_organization"] );
					self::save_option( "impressum_manager_name_company", @$_POST["impressum_manager_name_company"] );
					self::save_option( "impressum_manager_address", @$_POST["impressum_manager_address"] );
					self::save_option( "impressum_manager_address_extra", @$_POST["impressum_manager_address_extra"] );
					self::save_option( "impressum_manager_place", @$_POST["impressum_manager_place"] );
					self::save_option( "impressum_manager_zip", @$_POST["impressum_manager_zip"] );
					self::save_option( "impressum_manager_country", @$_POST["impressum_manager_country"] );
					self::save_option( "impressum_manager_fax", @$_POST["impressum_manager_fax"] );
					self::save_option( "impressum_manager_email", @$_POST["impressum_manager_email"] );
					self::save_option( "impressum_manager_phone", @$_POST["impressum_manager_phone"] );
				}

				include( plugin_dir_path( __FILE__ ) . "admin/views/tutorial/page2.php" );
				break;

			case 3:

				if ( array_key_exists( "submit", $_REQUEST ) ) {
					self::save_option( "impressum_manager_authorized_person", @$_POST["impressum_manager_authorized_person"] );
					self::save_option( "impressum_manager_vat", @$_POST["impressum_manager_vat"] );
					self::save_option( "impressum_manager_register", @$_POST["impressum_manager_register"] );
					self::save_option( "impressum_manager_registenr", @$_POST["impressum_manager_registenr"] );
					self::save_option( "impressum_manager_regulated_profession", @$_POST["impressum_manager_regulated_profession"] );
					self::save_option( "impressum_manager_state", @$_POST["impressum_manager_state"] );
					self::save_option( "impressum_manager_state_rules", @$_POST["impressum_manager_state_rules"] );
					self::save_option( "impressum_manager_chamber", @$_POST["impressum_manager_chamber"] );
					self::save_option( "impressum_manager_image_source", @$_POST["impressum_manager_image_source"] );
					self::save_option( "impressum_manager_responsible_chamber", @$_POST["impressum_manager_responsible_chamber"] );
					self::save_option( "impressum_manager_responsible_persons", @$_POST["impressum_manager_responsible_persons"] );
					self::save_option( "impressum_manager_press_content", @$_POST["impressum_manager_press_content"] );
					self::save_option( "impressum_manager_allowness", @$_POST["impressum_manager_allowness"] );
					self::save_option( "impressum_manager_regulated_profession_checked", @$_POST['impressum_manager_regulated_profession_checked'] );
				}

				include( plugin_dir_path( __FILE__ ) . "admin/views/tutorial/page3.php" );
				break;

			case 4:
				if ( array_key_exists("submit", $_REQUEST)) {
					self::save_option( "impressum_manager_disclaimer", @$_POST["impressum_manager_disclaimer"] );
					self::save_option( "impressum_manager_general_privacy_policy", @$_POST["impressum_manager_general_privacy_policy"] );
					self::save_option( "impressum_manager_policy_facebook", @$_POST["impressum_manager_policy_facebook"] );
					self::save_option( "impressum_manager_policy_google_analytics", @$_POST["impressum_manager_policy_google_analytics"] );
					self::save_option( "impressum_manager_policy_google_adsense", @$_POST["impressum_manager_policy_google_adsense"] );
					self::save_option( "impressum_manager_policy_google_plus", @$_POST["impressum_manager_policy_google_plus"] );
					self::save_option( "impressum_manager_policy_twitter", @$_POST["impressum_manager_policy_twitter"] );
					self::save_option( "impressum_manager_extra_field", @$_POST["impressum_manager_extra_field"] );
				}

				include( plugin_dir_path( __FILE__ ) . "admin/views/tutorial/page4.php" );
				break;


			default:
				self::show();
		}
	}

	private static function display_config_page() {
		?>
		<script>
			(function ($) {
				$(document).ready(function () {
					$("#delete_options").click(function () {
						var data = {
							'action': 'impressum_manager_delete_options',
							'delete': true
						};

						console.log(data);

						$.post(ajaxurl, data, function (response) {
							console.log(respnse);
						});
					});
				});
			}(jQuery));
		</script>
		<div class="wrap">
			<h2>Impressum Manager</h2>
			<small>Version: <?= IMPRESSUM_MANAGER_VERSION ?></small>
			|
			<small><a href="javascript:void(0);" id="delete_options">Delete options</a></small>
			<br><br>
			<?php
			if ( ! array_key_exists( "setup", $_GET ) ) {
				?>
				<h2 class="nav-tab-wrapper" id="impressum-manager-tabs">
					<a class="nav-tab nav-tab-active" id="settings-tab"
					   href="javascript:void(0);"><?= __( "General" ) ?></a>
					<a class="nav-tab" id="fields-tab" href="javascript:void(0);"><?= __( "Impressum Fields" ) ?></a>
					<a class="nav-tab" id="settings2-tab" href="javascript:void(0);"><?= __( "Kontaktdaten" ) ?></a>
					<a class="nav-tab" id="preview-tab" href="javascript:void(0);"><?= __( "Preview" ) ?></a>
				</h2>

				<div class="settings-tab tab">
					<?php include( plugin_dir_path( __FILE__ ) . "admin/views/general-tab.php" ) ?>
				</div>
				<div class="fields-tab tab" style="display:none;">
					<?php include( plugin_dir_path( __FILE__ ) . "admin/views/fields-tab.php" ) ?>
				</div>
				<div class="settings2-tab tab" style="display:none;">
					<?php include( plugin_dir_path( __FILE__ ) . "admin/views/settings-tab.php" ) ?>
				</div>
				<div class="preview-tab tab" style="display:none;">
					<?php include( plugin_dir_path( __FILE__ ) . "admin/views/preview-tab.php" ) ?>
				</div>
			<?php } ?>
		</div>
	<?php
	}

	public static function register_settings() {
		register_setting( "impressum-manager-policy_group", "impressum_manager_disclaimer" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_set_impressum" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_language_of_impressum" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_general_privacy_policy" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_policy_facebook" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_policy_google_analytics" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_policy_google_adsense" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_policy_twitter" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_policy_google_plus" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_page" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_disabled" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_extra_field" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_noindex" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_show_email_as_image" );

		register_setting( "impressum-manager-settings-group", "impressum_manager_person" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_form_of_organization" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_name_company" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_address" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_address_extra" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_place" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_zip" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_country" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_fax" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_email" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_disclaimer" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_phone" );

		register_setting( "impressum-manager-settings-group", "impressum_manager_authorized_person" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_vat" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_register" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_registenr" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_regulated_profession" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_state" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_state_rules" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_chamber" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_image_source" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_responsible_chamber" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_responsible_persons" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_press_content" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_allowness" );
		register_setting( "impressum-manager-settings-group", "impressum_manager_regulated_profession_checked" );
	}

	public static function save_option( $name, $val ) {
		if ( get_option( $name ) !== false ) {
			update_option( $name, $val );
		} else {
			add_option( $name, $val );
		}
	}
}
