<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class Impressum_Manager_Admin {

	private $slug;

	private $_countries = array(
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

	private static $instance = null;

	public function __construct() {
		$this->slug = "impressum-manager";

		if ( array_key_exists( "dismiss", $_REQUEST ) ) {
			if ( get_option( "impressum_manager_notice" ) === false ) {
				add_option( "impressum_manager_notice", "dismissed" );
			} else {
				update_option( "impressum_manager_notice", "dismissed" );
			}
		}

		if ( is_admin() ) {
			add_action( 'admin_init', array( $this, 'admin_init' ) );
			add_action( 'admin_menu', array( $this, 'add_menu' ) );
			add_action( 'admin_notices', array( $this, 'installation_notice' ) );
			add_action( 'wp_ajax_impressum_manager_delete_options', array( $this, 'delete_callback' ) );
		}
	}

	public static function installation_notice() {
		$request = $_SERVER['REQUEST_URI'];
		if ( strpos( $request, Impressum_Manager_Admin::get_instance()->get_slug() ) !== false ) {
			// indside impressum
		} else {
			if ( get_option( "impressum_manager_notice" ) === false && get_option( "impressum_manager_name_company" ) === false ) {
				$class   = "error";
				$message = sprintf( __( "Dein Wordpress Impressum ist nicht eingerichtet! %s, um deine Webseite rechtssicher zu machen." ), "<a href='options-general.php?page=" . Impressum_Manager_Admin::get_instance()->get_slug() . "&step=1&&setup=true&dismiss=true'>Lege jetzt dein Impressum an</a>" );
				echo "<div class=\"$class\"> <p>$message</p></div>";
			}
		}
	}

	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new Impressum_Manager_Admin();
		}

		return self::$instance;
	}

	/**
	 * ajax response for DEV options
	 * TODO: Delete before release to Wordpress
	 */
	function delete_callback() {
		echo "OK";
		require_once plugin_dir_path( __FILE__ ) . "uninstall.php";
		die();
	}

	public function admin_init() {
		$this->register_settings();
		wp_enqueue_style( 'impressum_manager_style', plugins_url( 'css/impressum-manager.min.css', __FILE__ ) );
		wp_enqueue_script( 'impressum_manager_script', plugins_url( 'js/impressum-manager.min.js', __FILE__ ) );
		wp_enqueue_script( 'jquery' );
	}

	public function add_menu() {
		$hook = add_options_page( "Impressum Manager", 'Impressum Manager', 'manage_options', $this->get_slug(), array(
			$this,
			'show'
		), 99.5 );
		add_action( 'load-' . $hook, array( $this, 'add_help_tab' ) );
	}

	public function add_help_tab() {
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

	/**
	 * @return mixed
	 */
	public function get_slug() {
		return $this->slug;
	}

	public function show() {
		if ( get_option( 'impressum_manager_no_setup' ) === false ) {
			?>
			<form action="options-general.php">
				<table class="form-table">
					<input type="hidden" name="page"
					       value="<?= Impressum_Manager_Admin::get_instance()->get_slug() ?>">
					<input type="hidden" name="step" value="1"/>
					<input type="hidden" name="setup" value="true"/>
					<tbody>
					<tr>
						<th>
							<?= __( "Impressum Konfiguration" ) ?>
						</th>
						<td>
							<input class="button" type="submit" value="<?= _e( 'Impressum konfigurieren' ) ?>">
						</td>
					</tr>
					</tbody>
				</table>
			</form>
			<form action="options-general.php">
				<table class="form-table">
					<input type="hidden" name="page"
					       value="<?= Impressum_Manager_Admin::get_instance()->get_slug() ?>">
					<input type="hidden" name="step" value="1"/>
					<input type="hidden" name="setup" value="true"/>
					<tbody>
					<tr>
						<th>
							<?= __( "Überspringen" ) ?>
						</th>
						<td>
							<input class="button" type="submit" value="<?= _e( 'Überspringen' ) ?>">
						</td>
					</tr>
					</tbody>
				</table>
			</form>
		<?php
		} else {
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
				<small>Version: <?= IMPRESSUMMANAGER_VERSION ?></small>
				|
				<small><a href="javascript:void(0);" id="delete_options">Delete options</a></small>
				<br><br>
				<?php
				if ( ! array_key_exists( "setup", $_GET )) {
				?>
				<h2 class="nav-tab-wrapper" id="impressum-manager-tabs">
					<a class="nav-tab nav-tab-active" id="settings-tab"
					   href="javascript:void(0);"><?= __( "General" ) ?></a>
					<a class="nav-tab" id="fields-tab" href="javascript:void(0);"><?= __( "Impressum Fields" ) ?></a>
					<a class="nav-tab" id="settings2-tab" href="javascript:void(0);"><?= __( "Kontaktdaten" ) ?></a>
					<a class="nav-tab" id="preview-tab" href="javascript:void(0);"><?= __( "Preview" ) ?></a>
				</h2>

				<div class="settings-tab tab">
					<?php
					}
					$this->show_setup();
					if ( ! array_key_exists( "setup", $_GET )) {
					?>
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
	}

	private
	function save_option(
		$name, $val
	) {
		if ( get_option( $name ) !== false ) {
			update_option( $name, $val );
		} else {
			add_option( $name, $val );
		}
	}

	private
	function config_page_1(
		$option_url, $show_buttons
	) {
		?>

		<script type="text/javascript">
			(function ($) {
				$(document).ready(function () {
					$("#person_1").click(function () {
						$(".rechtsform").fadeOut();
						$("#full_name").text("<?=__("Vollständiger Name")?>");
					});
					$("#person_2").click(function () {
						$(".rechtsform").fadeIn();
						$("#full_name").text("<?=__("Firmenname inkl. Rechtsform")?>");
					})
				});
			}(jQuery));
		</script>
		<br>
		<?php if ( $show_buttons ) { ?>
			<a href="<?= $option_url ?>">
				<input type="button" class="button button-secondary"
				       value="<?= __( "Zurück zu den Einstellungen", $this->slug ) ?>">
			</a>

		<?php } ?>

		<form action="<?= $option_url ?>&setup=true&step=2" method="post">
			<table class="form-table">
				<tr valign="top">
					<th scope="row" colspan="2"><b><?= __( "Art der Person", $this->slug ) ?></b></th>
				</tr>
				<tr valign="top">
					<td width="5"><input type="radio" id="person_1" name="impressum_manager_person"
					                     value="1" <?php
						if ( get_option( "impressum_manager_person" ) == '1' ) {
							echo "checked=checked";
						}
						?>>
					</td>
					<td>Privatperson</td>
				</tr>
				<tr valign="top">
					<td><input type="radio" id="person_2" name="impressum_manager_person"
					           value="2" <?php
						if ( get_option( "impressum_manager_person" ) == '2' ) {
							echo "checked=checked";
						}
						?>>
					</td>
					<td><?= __( "Juristische Person (z.B. Firma, Verein, Organisation, Einrichtung)" ) ?></td>
				</tr>
			</table>
			<table class="form-table">
				<tr valign="top" class="rechtsform">
					<th scope="row" colspan="2" style="width: 300px"><b><?= __( "Rechtsform" ) ?></b></th>
				</tr>
				<tr valign="top" class="rechtsform">
					<td colspan="2">
						<select name="impressum_manager_form_of_organization">
							<?php
							$forms_of_organization = array(
								__( "Einzelunternehmen", $this->slug ),
								__( "Stille Gesellschaft", $this->slug ),
								__( "Offene Handelsgesellschaft (OHG)", $this->slug ),
								__( "Kommanditgesellschaft (KG)", $this->slug ),
								__( "Gesellschaft bürgerlichen Rechts (GdR)", $this->slug ),
								__( "Aktiengesellschaft (AG)", $this->slug ),
								__( "Kommanditgesellschaft auf Aktien (KGaA)", $this->slug ),
								__( "Gesellschaft mit beschränkter Haftung (GmbH)", $this->slug ),
								__( "Genossenschaft (eG)", $this->slug )
							);

							$idx = 1;
							foreach ( $forms_of_organization as $org_form ) {
								?>
								<option value="<?= $idx ?>" <?php
								if ( $idx == get_option( "impressum_manager_form_of_organization" ) ) {
									echo "selected=selected";
								}
								?>><?= $org_form ?></option>
								<?php
								$idx ++;
							}
							?>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" colspan="2"><b><?= __( "Angaben zur Organisation", $this->slug ) ?></b></th>
				</tr>
				<tr>
					<td colspan="2">
						<input type="text" style="width: 340px" name="impressum_manager_name_company"
						       title="Company Name"
						       value="<?= get_option( "impressum_manager_name_company" ) ?>"><br>
						<small id="full_name"><?= __( "Vollständiger Name", $this->slug ) ?></small>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="text" name="impressum_manager_address" title="Address" style="width: 340px"
						       value="<?= get_option( "impressum_manager_address" ) ?>"><br>
						<small><?= __( "Straße & Hausnummer", $this->slug ) ?></small>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="text" name="impressum_manager_address_extra" title="Address Extra"
						       style="width: 340px"
						       value="<?= get_option( "impressum_manager_address_extra" ) ?>"><br>
						<small><?= __( "Adresszusatz", $this->slug ) ?></small>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<table>
							<tr>
								<td style="padding: 0;"><input type="text" name="impressum_manager_place"
								                               title="Place"
								                               value="<?= get_option( "impressum_manager_place" ) ?>"><br>
									<small><?= __( "Ort" ) ?></small>
								</td>
								<td style="padding: 0;"><input type="text" name="impressum_manager_zip"
								                               title="ZIP Code"
								                               value="<?= get_option( "impressum_manager_zip" ) ?>"><br>
									<small><?= __( "PLZ" ) ?></small>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<select name="impressum_manager_country" style="width: 340px">
							<option value="no_land_choosen"><?= __( "Wähle dein Land ..." ) ?></option>
							<?php

							foreach ( $this->_countries as $country_code => $country_name ) {
								if ( get_option( "impressum_manager_country" ) == $country_code ) {
									$s = "selected=selected";
								} else {
									$s = "";
								}

								?>
								<option
									value="<?= $country_code ?>" <?= $s ?>><?= __( $country_name, $this->slug ) ?></option>
							<?php
							}

							?>
						</select><br>
						<small>Land</small>
					</td>
				</tr>
				<tr>
					<th colspan="2">
						<b><?= __( "Telefonnummer (inkl. Vorwahl)", $this->slug ) ?></b>
					</th>
				</tr>
				<tr>
					<td colspan="2">
						<input type="text" name="impressum_manager_phone" title="Phone Number"
						       style="width: 340px"
						       value="<?= get_option( "impressum_manager_phone" ) ?>">
					</td>
				</tr>
				<tr>
					<th colspan="2">
						<b><?= __( "Faxnummer (optional)", $this->slug ) ?></b>
					</th>
				</tr>
				<tr>
					<td colspan="2">
						<input type="text" name="impressum_manager_fax" title="Fax Number" style="width: 340px"
						       value="<?= get_option( "impressum_manager_fax" ) ?>">
					</td>
				</tr>
				<tr>
					<th colspan="2">
						<b><?= __( "E-Mail Adresse", $this->slug ) ?></b>
					</th>
				</tr>
				<tr>
					<td colspan="2">
						<input type="text" name="impressum_manager_email" title="E-Mail Address"
						       style="width: 340px"
						       value="<?= get_option( "impressum_manager_email" ) ?>">
					</td>
				</tr>
			</table>
			<?php if ( $show_buttons ) { ?>
				<table>
				<tr>
					<td>
						<a href="options-general.php?page=<?= Impressum_Manager_Admin::get_instance()->get_slug() ?>">
							<input type="button" class="button button-secondary"
							       value="<?= __( "Zurück zu den Einstellungen", $this->slug ) ?>"
							       style="margin-top: 5px">
						</a>
					</td>
					<td>
						<?= submit_button( __( "Nächster Schritt", $this->slug ) ) ?>
					</td>
				</tr>
				</table><?php } ?>
		</form>

	<?php
	}

	private
	function config_page_2(
		$option_url, $show_buttons, $last_page = false
	) {

		$person = get_option( "impressum_manager_person" );

		if ( $person == 1 ) {
			$cssDef = "style='display:none;'";
		} else if ( $person == 2 ) {
			$cssDef = "";
		}

		?>

		<script type="text/javascript">
			(function ($) {
				$(document).ready(function () {
					$("#press_content_textarea").hide();
					$("#allowness_textarea").hide();
					$(".hide_regulated_profession").hide();

					if ($("#press_content").attr("checked") == true || $("#press_content").attr("checked") == "checked") {
						$("#press_content_textarea").show();
					}

					if ($("#allowness").attr("checked") == true || $("#allowness").attr("checked") == "checked") {
						$("#allowness_textarea").show();
					}

					if ($("#regulated_profession").attr("checked") == true || $("#regulated_profession").attr("checked") == "checked") {
						$(".hide_regulated_profession").show();
					}

					$("#press_content").click(function () {
						if ($(this).attr("checked")) {
							$("#press_content_textarea").show();
						} else {
							$("#press_content_textarea").hide();
						}
					});

					$("#allowness").click(function () {
						if ($(this).attr("checked")) {
							$("#allowness_textarea").show();
						} else {
							$("#allowness_textarea").hide();
						}
					});

					$("#regulated_profession").click(function () {
						if ($(this).attr("checked")) {
							$(".hide_regulated_profession").show();
						} else {
							$(".hide_regulated_profession").hide();
						}
					});
				});
			}(jQuery));
		</script>

		<form action="<?= $option_url ?>&setup=true&step=3" method="post">
			<table class="form-table" <?= $cssDef ?>>
				<tr valign="top">
					<th scope="row" colspan="2"><b><?= __( "Vertretungsberechtigte Persone(n)", $this->slug ) ?></b>
					</th>
				</tr>
				<tr valign="top">
					<td colspan="2">
                        <textarea name="impressum_manager_authorized_person"
                                  style="width: 340px; height: 225px;"><?= get_option( "impressum_manager_authorized_person" ) ?></textarea><br>
						<small><?= __( "Namen und Vornamen", $this->slug ) ?></small>
					</td>
				</tr>
			</table>
			<table class="form-table">
				<tr valign="top" <?= $cssDef ?>>
					<th scope="row" colspan="2"><b><?= __( "Umsatzsteuer ID", $this->slug ) ?></b></th>
				</tr>
				<tr valign="top" <?= $cssDef ?>>
					<td colspan="2">
						<input type="text" name="impressum_manager_vat" title="VAT" style="width: 340px"
						       value="<?= get_option( "impressum_manager_vat" ) ?>">
					</td>
				</tr>
				<tr valign="top" <?= $cssDef ?>>
					<th scope="row" colspan="2"><b><?= __( "Register", $this->slug ) ?></b></th>
				</tr>
				<tr valign="top" <?= $cssDef ?>>
					<td colspan="2">
						<select name="impressum_manager_register">
							<?php
							$registerDescr = array(
								__( "Kein Register", $this->slug ),
								__( "Genossenschaftsregister", $this->slug ),
								__( "Handelsregister", $this->slug ),
								__( "Partnerschaftsregister", $this->slug ),
								__( "Vereinsregister", $this->slug )
							);

							$idx = 1;

							echo get_option( "impressum_manager_register" );

							foreach ( $registerDescr as $registerName ) {
								if ( get_option( "impressum_manager_register" ) == $idx ) {
									$selected = "selected=selected";
								} else {
									$selected = "";
								}
								?>
								<option value="<?= $idx ?>" <?= $selected ?>><?= $registerName ?></option>
								<?php
								$idx ++;
							}

							?>
						</select>
					</td>
				</tr>

				<tr valign="top" <?= $cssDef ?>>
					<th scope="row" colspan="2"><b><?= __( "Registernummer", $this->slug ) ?></b></th>
				</tr>
				<tr valign="top" <?= $cssDef ?>>
					<td colspan="2">
						<input type="text" name="impressum_manager_registenr" title="Registernummer"
						       style="width: 340px"
						       value="<?= get_option( "impressum_manager_registenr" ) ?>">
					</td>
				</tr>
			</table>
			<table class="form-table">
				<tr valign="top">
					<th scope="row" colspan="2"><input type="checkbox" id="regulated_profession"
					                                   name="impressum_manager_regulated_profession_checked" <?= checked( "on", get_option( "impressum_manager_regulated_profession_checked" ), false ) ?>><label
							for="regulated_profession"><b><?= __( "Reglementierter Beruf", $this->slug ) ?></b></label>
					</th>
				</tr>
				<tr valign="top" class="hide_regulated_profession">
					<td colspan="2">
						<input type="text" name="impressum_manager_regulated_profession"
						       title="Regulated profession"
						       style="width: 340px"
						       value="<?= get_option( "impressum_manager_regulated_profession" ) ?>"><br>
						<small><?= __( "Gesetzliche Berufsbezeichnung", $this->slug ) ?></small>
					</td>
				</tr>
				<tr valign="top" class="hide_regulated_profession">
					<td colspan="2">
						<input type="text" name="impressum_manager_state" title="State"
						       style="width: 340px" value="<?= get_option( "impressum_manager_state" ) ?>"><br>
						<small><?= __( "Staat, in dem die Berufsbezeichnung verliehen wurde", $this->slug ) ?></small>
					</td>
				</tr>
				<tr valign="top" class="hide_regulated_profession">
					<td colspan="2">
						<input type="text" name="impressum_manager_state_rules" title="State rules"
						       style="width: 340px"
						       value="<?= get_option( "impressum_manager_state_rules" ) ?>"><br>
						<small><?= __( "Berfusrechtliche Regelungen (Bezeichnung)", $this->slug ) ?></small>
					</td>
				</tr>
				<tr valign="top" class="hide_regulated_profession">
					<td colspan="2">
						<input type="text" name="impressum_manager_chamber" title="Chamber"
						       style="width: 340px" value="<?= get_option( "impressum_manager_chamber" ) ?>"><br>
						<small><?= __( "Kammer, der Sie angehören", $this->slug ) ?></small>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" colspan="2"><input type="checkbox" id="allowness"
					                                   name="impressum_manager_allowness" <?= checked( "on", get_option( "impressum_manager_allowness" ), false ) ?>><label
							for="allowness"><b><?= __( "Behördliche Zuslassung", $this->slug ) ?></b></label></th>
				</tr>
				<tr valign="top" id="allowness_textarea">
					<td colspan="2">
                        <textarea name="impressum_manager_responsible_chamber"
                                  style="width: 340px; height: 225px;"><?= get_option( "impressum_manager_responsible_chamber" ) ?></textarea><br>
						<small><?= __( "Zuständige Aufsichtsbehörde", $this->slug ) ?></small>
					</td>
				</tr>
			</table>
			<table class="form-table">
				<tr valign="top">
					<th scope="row" colspan="2"><b><?= __( "Bildquellen", $this->slug ) ?></b></th>
				</tr>
				<tr valign="top">
					<td colspan="2">
                        <textarea name="impressum_manager_image_source"
                                  style="width: 340px; height: 225px;"><?= get_option( "impressum_manager_image_source" ) ?></textarea><br>
						<small><?= __( "z.B. Max Mustermann, http://www.fotolia.com", $this->slug ) ?></small>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row" colspan="2"><input type="checkbox" id="press_content"
					                                   name="impressum_manager_press_content" <?= checked( "on", get_option( "impressum_manager_press_content" ), false ) ?>
						<label
							for="press_content"><b><?= __( "journalistisch-redaktionelle Inhalte", $this->slug ) ?></b></label>
					</th>
				</tr>
				<tr valign="top" id="press_content_textarea">
					<td colspan="2">
                        <textarea name="impressum_manager_responsible_persons"
                                  style="width: 340px; height: 225px;"><?= get_option( "impressum_manager_responsible_persons" ) ?></textarea><br>
						<small><?= __( "Vor-, Nachname inkl. Anschrift angeben. Bei mehreren Verantwortlichen die
                                        Verantwortungen entsprechend mit angeben.", $this->slug ) ?>
						</small>
					</td>
				</tr>
			</table>
			<?php if ( $show_buttons ) { ?>
				<table>
					<tr>
						<td>
							<a href="options-general.php?page=<?= Impressum_Manager_Admin::get_instance()->get_slug() ?>">
								<input type="button" class="button button-secondary"
								       value="<?= __( "Zurück zu den Einstellungen", $this->slug ) ?>"
								       style="margin-top: 5px">
							</a>
						</td>
						<?php if ( ! $last_page ) { ?>
							<td>
								<a href="options-general.php?page=<?= Impressum_Manager_Admin::get_instance()->get_slug() ?>&step=1&setup=true">
									<input type="button" class="button button-secondary"
									       value="<?= __( "Schritt zurück", $this->slug ) ?>"
									       style="margin-top: 5px">
								</a>
							</td>
						<?php } ?>
						<?php if ( ! $last_page ) { ?>
							<td>
								<?= submit_button( __( "Nächster Schritt", $this->slug ) ) ?>
							</td>
						<?php } else { ?>
							<td>
								<?= submit_button( __( "Daten speichern", $this->slug ) ) ?>
							</td>
						<?php } ?>
					</tr>
				</table>
			<?php } ?>
		</form>

	<?php
	}

	private
	function config_page_3(
		$option_url, $show_buttons
	) {
		?>
		<form action="<?= $option_url ?>&finish=true&firstset=true" method="post">
			<table class="form-table">
				<tbody>
				<tr>
					<th>
						<?= __( "Haftungsausschluss (Disclaimer)", $this->slug ) ?>
					</th>
					<td>
						<label for="impressum_manager_disclaimer">
							<input id="impressum_manager_disclaimer" type="checkbox"
							       name="impressum_manager_disclaimer" <?= checked( "on", get_option( "impressum_manager_disclaimer" ), false ) ?>>
							<?= __( "Füge einen Disclaimer in dein Impressum ein.", $this->slug ) ?>
						</label>
					</td>
				</tr>
				<tr>
					<th>
						<?= __( "Allgemine Datenschutzerklärung", $this->slug ) ?>
					</th>
					<td>
						<label for="impressum_manager_general_privacy_policy">
							<input id="impressum_manager_general_privacy_policy" type="checkbox"
							       name="impressum_manager_general_privacy_policy" <?= checked( "on", get_option( "impressum_manager_general_privacy_policy" ), false ) ?>>
							<?= __( "Füge eine allgemeine Datenschutzerklärung in dein Impressum ein.", $this->slug ) ?>
						</label>
					</td>
				</tr>
				<tr>
					<th>
						<?= __( "Datenschutzerklärung für Facebook", $this->slug ) ?>
					</th>
					<td>
						<label for="impressum_manager_policy_facebook">
							<input id="impressum_manager_policy_facebook" type="checkbox"
							       name="impressum_manager_policy_facebook" <?= checked( "on", get_option( "impressum_manager_policy_facebook" ), false ) ?>>
							<?= __( "Füge eine Datenschutzerklärung für die Nutzung von Facebook Elementen in dein Impressum ein.", $this->slug ) ?>
						</label>
					</td>
				</tr>
				<tr>
					<th>
						<?= __( "Datenschutzerklärung für Google", $this->slug ) ?>
					</th>
					<td>
						<label for="impressum_manager_policy_google_analytics">
							<input id="impressum_manager_policy_google_analytics" type="checkbox"
							       name="impressum_manager_policy_google_analytics" <?= checked( "on", get_option( "impressum_manager_policy_google_analytics" ), false ) ?>>
							<?= __( "Füge eine Datenschutzerklärung für die Nutzung von <b>Google Analytics</b> in dein Impressum ein.", $this->slug ) ?>
						</label>
						<br><br>
						<label for="impressum_manager_policy_google_adsense">
							<input id="impressum_manager_policy_google_adsense" type="checkbox"
							       name="impressum_manager_policy_google_adsense" <?= checked( "on", get_option( "impressum_manager_policy_google_adsense" ), false ) ?>>
							<?= __( "Füge eine Datenschutzerklärung für die Nutzung von <b>Google Adsense</b> in dein Impressum ein.", $this->slug ) ?>
						</label>
						<br><br>
						<label for="impressum_manager_policy_google_plus">
							<input id="impressum_manager_policy_google_plus" type="checkbox"
							       name="impressum_manager_policy_google_plus" <?= checked( "on", get_option( "impressum_manager_policy_google_plus" ), false ) ?>>
							<?= __( "Füge eine Datenschutzerklärung für die Nutzung von <b>Google +1</b> in dein Impressum ein.", $this->slug ) ?>
						</label>
					</td>
				</tr>
				<tr>
					<th>
						<?= _e( "Datenschutzerklärung für Twitter" ) ?>
					</th>
					<td>
						<label for="impressum_manager_policy_twitter">
							<input id="impressum_manager_policy_twitter" type="checkbox"
							       name="impressum_manager_policy_twitter" <?= checked( "on", get_option( "impressum_manager_policy_twitter" ), false ) ?>>
							<?= __( "Füge eine Datenschutzerklärung für die Nutzung von Twitter Elementen in dein Impressum ein.", $this->slug ) ?>
						</label>
					</td>
				</tr>
				<tr>
					<th>
						<?= __( "Zusatzfeld", $this->slug ) ?>
					</th>
					<td>
                        <textarea style="width:500px; height: 200px;"
                                  name="impressum_manager_extra_field"><?= get_option( "impressum_manager_extra_field" ) ?></textarea>
					</td>
				</tr>
				</tbody>
			</table>
			<?php if ( $show_buttons ) { ?>
				<table>
					<tr>
						<td>
							<a href="options-general.php?page=<?= Impressum_Manager_Admin::get_instance()->get_slug() ?>">
								<input type="button" class="button button-secondary"
								       value="<?= __( "Zurück zu den Einstellungen", $this->slug ) ?>"
								       style="margin-top: 5px">
							</a>
						</td>
						<td>
							<a href="options-general.php?page=<?= Impressum_Manager_Admin::get_instance()->get_slug() ?>&step=2&setup=true">
								<input type="button" class="button button-secondary"
								       value="<?= __( "Schritt zurück", $this->slug ) ?>"
								       style="margin-top: 5px">
							</a>
						</td>
						<td>
							<?= submit_button( __( "Daten speichern", $this->slug ) ) ?>
						</td>
					</tr>
				</table>
			<?php } ?>
		</form>

	<?php
	}

	public
	function show_setup() {
		$onboarded    = get_option( "impressum_manager_onboarding_conf" );
		$enter_config = true;
		$finish       = @$_GET['finish'];

		if ( $finish == "true" ) {
			if ( $onboarded == "onboarded" ) {
				$enter_config = false;
			} else {
				add_option( "impressum_manager_onboarding_conf", "onboarded" );
				@$_GET['step'] = 1;
			}
			update_option( "impressum_manager_onboarding_conf", "onboarded" );
		}

		if ( $onboarded == "onboarded" ) {
			$enter_config = false;
		}

		if ( empty( $finish ) && ( array_key_exists( "setup", $_REQUEST ) || $enter_config ) ) {

			// dismiss admin notice
			if ( get_option( "impressum_manager_notice" ) === false ) {
				add_option( "impressum_manager_notice", "dismissed" );
			} else {
				update_option( "impressum_manager_notice", "dismissed" );
			}

			$option_url = admin_url( "options-general.php" ) . "?page=" . Impressum_Manager_Admin::get_instance()->get_slug();

			if ( $enter_config ) {
				switch ( @$_GET['step'] ) {
					case 1:

						$this->config_page_1( $option_url, true );

						break;

					case 2:

						if ( array_key_exists( "submit", $_REQUEST ) ) {
							$this->save_option( "impressum_manager_person", $_POST["impressum_manager_person"] );
							$this->save_option( "impressum_manager_form_of_organization", $_POST["impressum_manager_form_of_organization"] );
							$this->save_option( "impressum_manager_name_company", $_POST["impressum_manager_name_company"] );
							$this->save_option( "impressum_manager_address", $_POST["impressum_manager_address"] );
							$this->save_option( "impressum_manager_address_extra", $_POST["impressum_manager_address_extra"] );
							$this->save_option( "impressum_manager_place", $_POST["impressum_manager_place"] );
							$this->save_option( "impressum_manager_zip", $_POST["impressum_manager_zip"] );
							$this->save_option( "impressum_manager_country", $_POST["impressum_manager_country"] );
							$this->save_option( "impressum_manager_fax", $_POST["impressum_manager_fax"] );
							$this->save_option( "impressum_manager_email", $_POST["impressum_manager_email"] );
							$this->save_option( "impressum_manager_phone", $_POST["impressum_manager_phone"] );
						}

						$this->config_page_2( $option_url, true );

						break;

					case 3:

						if ( array_key_exists( "submit", $_REQUEST ) ) {
							$this->save_option( "impressum_manager_authorized_person", $_POST["impressum_manager_authorized_person"] );
							$this->save_option( "impressum_manager_vat", $_POST["impressum_manager_vat"] );
							$this->save_option( "impressum_manager_register", $_POST["impressum_manager_register"] );
							$this->save_option( "impressum_manager_registenr", $_POST["impressum_manager_registenr"] );
							$this->save_option( "impressum_manager_regulated_profession", $_POST["impressum_manager_regulated_profession"] );
							$this->save_option( "impressum_manager_state", $_POST["impressum_manager_state"] );
							$this->save_option( "impressum_manager_state_rules", $_POST["impressum_manager_state_rules"] );
							$this->save_option( "impressum_manager_chamber", $_POST["impressum_manager_chamber"] );
							$this->save_option( "impressum_manager_image_source", $_POST["impressum_manager_image_source"] );
							$this->save_option( "impressum_manager_responsible_chamber", $_POST["impressum_manager_responsible_chamber"] );
							$this->save_option( "impressum_manager_responsible_persons", $_POST["impressum_manager_responsible_persons"] );
							$this->save_option( "impressum_manager_press_content", $_POST["impressum_manager_press_content"] );
							$this->save_option( "impressum_manager_allowness", $_POST["impressum_manager_allowness"] );
							$this->save_option( "impressum_manager_regulated_profession_checked", $_POST['impressum_manager_regulated_profession_checked'] );
						}

						$this->config_page_3( $option_url, true );

						break;

					default:
						$this->config_view();
				}
			} else {
				if ( array_key_exists( "submit", $_REQUEST ) ) {
					$this->save_option( "impressum_manager_person", $_POST["impressum_manager_person"] );
					$this->save_option( "impressum_manager_form_of_organization", $_POST["impressum_manager_form_of_organization"] );
					$this->save_option( "impressum_manager_name_company", $_POST["impressum_manager_name_company"] );
					$this->save_option( "impressum_manager_address", $_POST["impressum_manager_address"] );
					$this->save_option( "impressum_manager_address_extra", $_POST["impressum_manager_address_extra"] );
					$this->save_option( "impressum_manager_place", $_POST["impressum_manager_place"] );
					$this->save_option( "impressum_manager_zip", $_POST["impressum_manager_zip"] );
					$this->save_option( "impressum_manager_country", $_POST["impressum_manager_country"] );
					$this->save_option( "impressum_manager_fax", $_POST["impressum_manager_fax"] );
					$this->save_option( "impressum_manager_email", $_POST["impressum_manager_email"] );
					$this->save_option( "impressum_manager_phone", $_POST["impressum_manager_phone"] );
					$this->save_option( "impressum_manager_authorized_person", $_POST["impressum_manager_authorized_person"] );
					$this->save_option( "impressum_manager_vat", $_POST["impressum_manager_vat"] );
					$this->save_option( "impressum_manager_register", $_POST["impressum_manager_register"] );
					$this->save_option( "impressum_manager_registenr", $_POST["impressum_manager_registenr"] );
					$this->save_option( "impressum_manager_regulated_profession", $_POST["impressum_manager_regulated_profession"] );
					$this->save_option( "impressum_manager_state", $_POST["impressum_manager_state"] );
					$this->save_option( "impressum_manager_state_rules", $_POST["impressum_manager_state_rules"] );
					$this->save_option( "impressum_manager_chamber", $_POST["impressum_manager_chamber"] );
					$this->save_option( "impressum_manager_image_source", $_POST["impressum_manager_image_source"] );
					$this->save_option( "impressum_manager_responsible_chamber", $_POST["impressum_manager_responsible_chamber"] );
					$this->save_option( "impressum_manager_responsible_persons", $_POST["impressum_manager_responsible_persons"] );
					$this->save_option( "impressum_manager_press_content", $_POST["impressum_manager_press_content"] );
					$this->save_option( "impressum_manager_allowness", $_POST["impressum_manager_allowness"] );
					$this->save_option( "impressum_manager_regulated_profession_checked", $_POST['impressum_manager_regulated_profession_checked'] );

				}

				$this->config_page_1( $option_url, false );
				$this->config_page_2( $option_url, true, true );
			}
		} else {
			$this->config_view();
		}
	}

	private
	function register_settings() {
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

		register_setting( "impressum-manager-policy_group", "impressum_manager_person" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_form_of_organization" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_name_company" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_address" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_address_extra" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_place" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_zip" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_country" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_fax" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_email" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_disclaimer" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_phone" );

		register_setting( "impressum-manager-policy_group", "impressum_manager_authorized_person" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_vat" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_register" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_registenr" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_regulated_profession" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_state" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_state_rules" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_chamber" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_image_source" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_responsible_chamber" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_responsible_persons" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_press_content" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_allowness" );
		register_setting( "impressum-manager-policy_group", "impressum_manager_regulated_profession_checked" );
	}

	private
	function config_view() {

		$impressummanager_settings[] = $impressummanager_language = @$_POST['impressum_manager_language_of_impressum'];
		$impressummanager_settings[] = $general_privacy_policy = @$_POST['impressum_manager_general_privacy_policy'];
		$impressummanager_settings[] = $disclaimer = @$_POST['impressum_manager_disclaimer'];
		$impressummanager_settings[] = $policy_facebook = @$_POST['impressum_manager_policy_facebook'];
		$impressummanager_settings[] = $policy_google_analytics = @$_POST['impressum_manager_policy_google_analytics'];
		$impressummanager_settings[] = $policy_google_adsense = @$_POST['impressum_manager_policy_google_adsense'];
		$impressummanager_settings[] = $policy_google_plus = @$_POST['impressum_manager_policy_google_plus'];
		$impressummanager_settings[] = $policy_google_twitter = @$_POST['impressum_manager_policy_twitter'];
		$impressummanager_settings[] = $extra_field = @$_POST['impressum_manager_extra_field'];

		if ( array_key_exists( "firstset", @$_GET ) && @$_GET['finish'] == true && array_key_exists( "submit", $_REQUEST ) ) {
			$this->save_option( "impressum_manager_language_of_impressum", $impressummanager_language );
			$this->save_option( "impressum_manager_general_privacy_policy", $general_privacy_policy );
			$this->save_option( "impressum_manager_disclaimer", $disclaimer );
			$this->save_option( "impressum_manager_policy_facebook", $policy_facebook );
			$this->save_option( "impressum_manager_policy_google_analytics", $policy_google_analytics );
			$this->save_option( "impressum_manager_policy_google_adsense", $policy_google_adsense );
			$this->save_option( "impressum_manager_policy_google_plus", $policy_google_plus );
			$this->save_option( "impressum_manager_policy_twitter", $policy_google_twitter );
			$this->save_option( "impressum_manager_extra_field", $extra_field );
		}

		?>


		<form action="options-general.php">
			<table class="form-table">
				<input type="hidden" name="page"
				       value="<?= Impressum_Manager_Admin::get_instance()->get_slug() ?>">
				<input type="hidden" name="step" value="1"/>
				<input type="hidden" name="setup" value="true"/>
				<tbody>
				<tr>
					<th>
						<?= __( "Impressum Konfiguration" ) ?>
					</th>
					<td>
						<input class="button" type="submit" value="<?= _e( 'Impressum konfigurieren' ) ?>">
					</td>
				</tr>
				</tbody>
			</table>
		</form>
		<form method="post" action="options.php">
			<?php settings_fields( 'impressum-manager-policy_group' ); ?>
			<?php do_settings_sections( 'impressum-manager-policy_group' ); ?>
			<table class="form-table">
				<tbody>
				<!--tr>
                    <th scope="row"><?= __( "Language", $this->slug ) ?></th>
                    <td>
                        <select name="impressum_manager_language_of_impressum" style="width: 340px">
                            <option>Wähle dein Land ...</option>
                            <option value="DE" <?php
				if ( get_option( "impressum_manager_language_of_impressum" ) == "DE" ) {
					echo "selected=selected";
				}
				?>>Deutsch
                            </option>
                        </select><br><br>
                        <?= __( "Wähle die Sprache für dein Impressum", $this->slug ) ?>
                    </td>
                </tr-->
				<tr>
					<th scope="row"><?= __( "No Index", $this->slug ) ?></th>
					<td>
						<label for="impressum_manager_noindex">
							<input id="impressum_manager_noindex" type="checkbox"
							       name="impressum_manager_noindex" <?= checked( "on", get_option( "impressum_manager_noindex" ), false ) ?>>
							<?= __( "Lass die Impressum Seite nicht von Suchmaschinen indexieren.", $this->slug ) ?>
						</label>
					</td>
				</tr>
				<tr>
					<th scope="row"><?= __( "E-Mail as Image", $this->slug ) ?></th>
					<td>
						<label for="impressum_manager_show_email_as_image">
							<input id="impressum_manager_show_email_as_image" type="checkbox"
							       name="impressum_manager_show_email_as_image" <?= checked( "on", get_option( "impressum_manager_show_email_as_image" ), false ) ?>>
							<?= __( "Show E-Mail as Image to prevent Spam.", $this->slug ) ?>
						</label>
					</td>
				</tr>
				<tr>
					<th colspan="2"><h2><?= __( "Impressum Inhalt Einstellungen", $this->slug ) ?></h2></th>
				</tr>
				<tr>
					<th>
						<?= __( "Haftungsausschluss (Disclaimer)", $this->slug ) ?>
					</th>
					<td>
						<label for="impressum_manager_disclaimer">
							<input id="impressum_manager_disclaimer" type="checkbox"
							       name="impressum_manager_disclaimer" <?= checked( "on", get_option( "impressum_manager_disclaimer" ), false ) ?>>
							<?= __( "Füge einen Disclaimer in dein Impressum ein.", $this->slug ) ?>
						</label>
					</td>
				</tr>
				<tr>
					<th>
						<?= __( "Allgemine Datenschutzerklärung", $this->slug ) ?>
					</th>
					<td>
						<label for="impressum_manager_general_privacy_policy">
							<input id="impressum_manager_general_privacy_policy" type="checkbox"
							       name="impressum_manager_general_privacy_policy" <?= checked( "on", get_option( "impressum_manager_general_privacy_policy" ), false ) ?>>
							<?= __( "Füge eine allgemeine Datenschutzerklärung in dein Impressum ein.", $this->slug ) ?>
						</label>
					</td>
				</tr>
				<tr>
					<th>
						<?= __( "Datenschutzerklärung für Facebook", $this->slug ) ?>
					</th>
					<td>
						<label for="impressum_manager_policy_facebook">
							<input id="impressum_manager_policy_facebook" type="checkbox"
							       name="impressum_manager_policy_facebook" <?= checked( "on", get_option( "impressum_manager_policy_facebook" ), false ) ?>>
							<?= __( "Füge eine Datenschutzerklärung für die Nutzung von Facebook Elementen in dein Impressum ein.", $this->slug ) ?>
						</label>
					</td>
				</tr>
				<tr>
					<th>
						<?= __( "Datenschutzerklärung für Google", $this->slug ) ?>
					</th>
					<td>
						<label for="impressum_manager_policy_google_analytics">
							<input id="impressum_manager_policy_google_analytics" type="checkbox"
							       name="impressum_manager_policy_google_analytics" <?= checked( "on", get_option( "impressum_manager_policy_google_analytics" ), false ) ?>>
							<?= __( "Füge eine Datenschutzerklärung für die Nutzung von <b>Google Analytics</b> in dein Impressum ein.", $this->slug ) ?>
						</label>
						<br><br>
						<label for="impressum_manager_policy_google_adsense">
							<input id="impressum_manager_policy_google_adsense" type="checkbox"
							       name="impressum_manager_policy_google_adsense" <?= checked( "on", get_option( "impressum_manager_policy_google_adsense" ), false ) ?>>
							<?= __( "Füge eine Datenschutzerklärung für die Nutzung von <b>Google Adsense</b> in dein Impressum ein.", $this->slug ) ?>
						</label>
						<br><br>
						<label for="impressum_manager_policy_google_plus">
							<input id="impressum_manager_policy_google_plus" type="checkbox"
							       name="impressum_manager_policy_google_plus" <?= checked( "on", get_option( "impressum_manager_policy_google_plus" ), false ) ?>>
							<?= __( "Füge eine Datenschutzerklärung für die Nutzung von <b>Google +1</b> in dein Impressum ein.", $this->slug ) ?>
						</label>
					</td>
				</tr>
				<tr>
					<th>
						<?= _e( "Datenschutzerklärung für Twitter" ) ?>
					</th>
					<td>
						<label for="impressum_manager_policy_twitter">
							<input id="impressum_manager_policy_twitter" type="checkbox"
							       name="impressum_manager_policy_twitter" <?= checked( "on", get_option( "impressum_manager_policy_twitter" ), false ) ?>>
							<?= __( "Füge eine Datenschutzerklärung für die Nutzung von Twitter Elementen in dein Impressum ein.", $this->slug ) ?>
						</label>
					</td>
				</tr>
				<tr>
					<th>
						<?= __( "Zusatzfeld", $this->slug ) ?>
					</th>
					<td>
                        <textarea style="width:500px; height: 200px;"
                                  name="impressum_manager_extra_field"><?= get_option( "impressum_manager_extra_field" ) ?></textarea>
					</td>
				</tr>
				</tbody>
			</table>
			<?php submit_button( __( "Impressum aktualisieren" ) ); ?>
		</form>
	<?php
	}
}
