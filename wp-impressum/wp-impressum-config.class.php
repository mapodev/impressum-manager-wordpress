<?php

class WP_Impressum_Config
{

    private $version;
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

    public function __construct()
    {
        $this->version = "0.2.1";
        $this->slug = "wp-impressum";

        if (array_key_exists("dismiss", $_REQUEST)) {
            if (get_option("wp_impressum_notice") === false) {
                add_option("wp_impressum_notice", "dismissed");
            } else {
                update_option("wp_impressum_notice", "dismissed");
            }
        }

        if (is_admin()) {
            add_action('admin_init', array($this, 'wpimpressum_admin_init'));
            add_action('admin_menu', array($this, 'wpimpressum_addmenu'));
        }
    }

    public function wpimpressum_admin_init()
    {
        $this->wpimpressum_register_settings();
        wp_enqueue_style('wp_impressum_style', plugins_url('../css/wp-impressum.min.css', __FILE__));
        wp_enqueue_script('wp_impressum_script', plugins_url('../js/wp-impressum.min.js', __FILE__));
        wp_enqueue_script('jquery');
    }

    public function wpimpressum_addmenu()
    {
        add_options_page("WP Impressum", 'WP Impressum', 'manage_options', $this->wpimpressum_getSlug(), array($this, 'wpimpressum_show'), 99.5);
    }


    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new WP_Impressum_Config();
        }
        return self::$instance;
    }

    /**
     * @return mixed
     */
    public function wpimpressum_getSlug()
    {
        return $this->slug;
    }

    /**
     * @return mixed
     */
    public function wpimpressum_getVersion()
    {
        return $this->version;
    }

    public function wpimpressum_show()
    {
        ?>
        <div class="wrap">
            <h2>WP Impressum</h2>
            <small>Version: <?= $this->version ?></small>
            <?php
            $this->wpimpressum_show_setup();
            ?>
        </div>
    <?php
    }

    private function wpimpressum_save_option($name, $val)
    {
        if (get_option($name) !== false) {
            update_option($name, $val);
        } else {
            add_option($name, $val);
        }
    }

    public function wpimpressum_show_setup()
    {
        $onboarded = get_option("wpimpresusm_onboarding_conf");
        $enter_config = true;

        if ($onboarded == "onboarded") {
            $enter_config = false;
        } else {
            add_option("wpimpresusm_onboarding_conf", "onboarded");
        }
        update_option("wpimpresusm_onboarding_conf", "onboarded");

        if (array_key_exists("setup", $_REQUEST) || $enter_config) {

            // dismiss admin notice
            if (get_option("wp_impressum_notice") === false) {
                add_option("wp_impressum_notice", "dismissed");
            } else {
                update_option("wp_impressum_notice", "dismissed");
            }

            $option_url = admin_url("options-general.php") . "?page=" . WP_Impressum_Config::getInstance()->wpimpressum_getSlug();

            switch ($_GET['step']) {
                case 1:
                    ?>

                    <script type="text/javascript">
                        jQuery(document).ready(function () {
                            jQuery("#person_1").click(function () {
                                jQuery(".rechtsform").fadeOut();
                                jQuery("#full_name").text("<?=__("Vollständiger Name")?>");
                            });
                            jQuery("#person_2").click(function () {
                                jQuery(".rechtsform").fadeIn();
                                jQuery("#full_name").text("<?=__("Firmenname inkl. Rechtsform")?>");
                            })
                        });
                    </script>
                    <br>
                    <a href="<?= $option_url ?>">
                        <input type="button" class="button button-secondary"
                               value="<?= __("Zurück zu den Einstellungen", $this->slug) ?>">
                    </a>

                    <form action="<?= $option_url ?>&setup=true&step=2" method="post">
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Art der Person</b></th>
                            </tr>
                            <tr valign="top">
                                <td width="5"><input type="radio" id="person_1" name="wp_impressum_person"
                                                     value="1" <?php
                                    if (get_option("wp_impressum_person") == '1') {
                                        echo "checked=checked";
                                    }
                                    ?>>
                                </td>
                                <td>Privatperson</td>
                            </tr>
                            <tr valign="top">
                                <td><input type="radio" id="person_2" name="wp_impressum_person"
                                           value="2" <?php
                                    if (get_option("wp_impressum_person") == '2') {
                                        echo "checked=checked";
                                    }
                                    ?>>
                                </td>
                                <td>Juristische Person (z.B. Firma, Verein, Organisation, Einrichtung)</td>
                            </tr>
                        </table>
                        <table class="form-table">
                            <tr valign="top" class="rechtsform">
                                <th scope="row" colspan="2" style="width: 300px"><b>Rechtsform</b></th>
                            </tr>
                            <tr valign="top" class="rechtsform">
                                <td colspan="2">
                                    <select name="wp_impressum_form_of_organization">
                                        <?php
                                        $forms_of_organization = array(
                                            "Einzelunternehmen",
                                            "Stille Gesellschaft",
                                            "Offene Handelsgesellschaft (OHG)",
                                            "Kommanditgesellschaft (KG)",
                                            "Gesellschaft bürgerlichen Rechts (GdR)",
                                            "Aktiengesellschaft (AG)",
                                            "Kommanditgesellschaft auf Aktien (KGaA)",
                                            "Gesellschaft mit beschränkter Haftung (GmbH)",
                                            "Genossenschaft (eG)"
                                        );

                                        $idx = 1;
                                        foreach ($forms_of_organization as $org_form) {
                                            ?>
                                            <option value="<?= $idx ?>" <?php
                                            if ($idx == get_option("wp_impressum_form_of_organization")) {
                                                echo "selected=selected";
                                            }
                                            ?>><?= $org_form ?></option>
                                            <?php
                                            $idx++;
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Angaben zur Organisation</b></th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="text" style="width: 340px" name="wp_impressum_name_company"
                                           title="Company Name"
                                           value="<?= get_option("wp_impressum_name_company") ?>"><br>
                                    <small id="full_name">Vollständiger Name</small>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="text" name="wp_impressum_address" title="Address" style="width: 340px"
                                           value="<?= get_option("wp_impressum_address") ?>"><br>
                                    <small>Straße & Hausnummer</small>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="text" name="wp_impressum_address_extra" title="Address Extra"
                                           style="width: 340px" value="<?= get_option("wp_impressum_address_extra") ?>"><br>
                                    <small>Adresszusatz</small>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td style="padding: 0;"><input type="text" name="wp_impressum_place"
                                                                           title="Place"
                                                                           value="<?= get_option("wp_impressum_place") ?>"><br>
                                                <small>Ort</small>
                                            </td>
                                            <td style="padding: 0;"><input type="text" name="wp_impressum_zip"
                                                                           title="ZIP Code"
                                                                           value="<?= get_option("wp_impressum_zip") ?>"><br>
                                                <small>PLZ</small>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select name="wp_impressum_country" style="width: 340px">
                                        <option value="no_land_choosen">Wähle dein Land ...</option>
                                        <?php

                                        foreach ($this->_countries as $country_code => $country_name) {
                                            if (get_option("wp_impressum_country") == $country_code) {
                                                $s = "selected=selected";
                                            } else {
                                                $s = "";
                                            }

                                            ?>
                                            <option
                                                value="<?= $country_code ?>" <?= $s ?>><?= __($country_name, $this->slug) ?></option>
                                        <?php
                                        }

                                        ?>
                                    </select><br>
                                    <small>Land</small>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <b>Telefonnummer (inkl. Vorwahl)</b>
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="text" name="wp_impressum_phone" title="Phone Number"
                                           style="width: 340px"
                                           value="<?= get_option("wp_impressum_phone") ?>">
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <b>Faxnummer (optional)</b>
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="text" name="wp_impressum_fax" title="Fax Number" style="width: 340px"
                                           value="<?= get_option("wp_impressum_fax") ?>">
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <b>E-Mail Adresse</b>
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="text" name="wp_impressum_email" title="E-Mail Address"
                                           style="width: 340px"
                                           value="<?= get_option("wp_impressum_email") ?>">
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>
                                    <a href="options-general.php?page=<?= WP_Impressum_Config::getInstance()->wpimpressum_getSlug() ?>">
                                        <input type="button" class="button button-secondary"
                                               value="<?= __("Zurück zu den Einstellungen", $this->slug) ?>"
                                               style="margin-top: 5px">
                                    </a>
                                </td>
                                <td>
                                    <?= submit_button(__("Nächster Schritt", $this->slug)) ?>
                                </td>
                            </tr>
                        </table>
                    </form>

                    <?php
                    break;

                case 2:

                    if (array_key_exists("submit", $_REQUEST)) {
                        $this->wpimpressum_save_option("wp_impressum_person", $_POST["wp_impressum_person"]);
                        $this->wpimpressum_save_option("wp_impressum_form_of_organization", $_POST["wp_impressum_form_of_organization"]);
                        $this->wpimpressum_save_option("wp_impressum_name_company", $_POST["wp_impressum_name_company"]);
                        $this->wpimpressum_save_option("wp_impressum_address", $_POST["wp_impressum_address"]);
                        $this->wpimpressum_save_option("wp_impressum_address_extra", $_POST["wp_impressum_address_extra"]);
                        $this->wpimpressum_save_option("wp_impressum_place", $_POST["wp_impressum_place"]);
                        $this->wpimpressum_save_option("wp_impressum_zip", $_POST["wp_impressum_zip"]);
                        $this->wpimpressum_save_option("wp_impressum_country", $_POST["wp_impressum_country"]);
                        $this->wpimpressum_save_option("wp_impressum_fax", $_POST["wp_impressum_fax"]);
                        $this->wpimpressum_save_option("wp_impressum_email", $_POST["wp_impressum_email"]);
                        $this->wpimpressum_save_option("wp_impressum_phone", $_POST["wp_impressum_phone"]);
                    }

                    $person = get_option("wp_impressum_person");

                    if ($person == 1) {
                        $cssDef = "style='display:none;'";
                    } else if ($person == 2) {
                        $cssDef = "";
                    }

                    ?>

                    <script type="text/javascript">
                        (function ($) {
                            $(document).ready(function () {
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
                            });
                        }(jQuery));
                    </script>

                    <form action="<?= $option_url ?>&setup=true&step=3" method="post">
                        <table class="form-table" <?= $cssDef ?>>
                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Vertretungsberechtigte Persone(n)</b></th>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <textarea name="wp_impressum_authorized_person"
                                              style="width: 340px; height: 225px;"><?= get_option("wp_impressum_authorized_person") ?></textarea><br>
                                    <small>Namen und Vornamen</small>
                                </td>
                            </tr>
                        </table>
                        <table class="form-table">
                            <tr valign="top" <?= $cssDef ?>>
                                <th scope="row" colspan="2"><b>Umsatzsteuer ID</b></th>
                            </tr>
                            <tr valign="top" <?= $cssDef ?>>
                                <td colspan="2">
                                    <input type="text" name="wp_impressum_vat" title="VAT" style="width: 340px"
                                           value="<?= get_option("wp_impressum_vat") ?>">
                                </td>
                            </tr>
                            <tr valign="top" <?= $cssDef ?>>
                                <th scope="row" colspan="2"><b>Register</b></th>
                            </tr>
                            <tr valign="top" <?= $cssDef ?>>
                                <td colspan="2">
                                    <select name="wp_impressum_register">
                                        <?php
                                        $registerDescr = array(
                                            "Kein Register",
                                            "Genossenschaftsregister",
                                            "Handelsregister",
                                            "Partnerschaftsregister",
                                            "Vereinsregister"
                                        );

                                        $idx = 1;

                                        echo get_option("wp_impressum_register");

                                        foreach ($registerDescr as $registerName) {
                                            if (get_option("wp_impressum_register") == $idx) {
                                                $selected = "selected=selected";
                                            } else {
                                                $selected = "";
                                            }
                                            ?>
                                            <option value="<?= $idx ?>" <?= $selected ?>><?= $registerName ?></option>
                                            <?php
                                            $idx++;
                                        }

                                        ?>
                                    </select>
                                </td>
                            </tr>

                            <tr valign="top" <?= $cssDef ?>>
                                <th scope="row" colspan="2"><b>Registernummer</b></th>
                            </tr>
                            <tr valign="top" <?= $cssDef ?>>
                                <td colspan="2">
                                    <input type="text" name="wp_impressum_registenr" title="Registernummer"
                                           style="width: 340px"
                                           value="<?= get_option("wp_impressum_registenr") ?>">
                                </td>
                            </tr>
                        </table>
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Reglementierter Beruf</b></th>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <input type="text" name="wp_impressum_regulated_profession"
                                           title="Regulated profession"
                                           style="width: 340px"
                                           value="<?= get_option("wp_impressum_regulated_profession") ?>"><br>
                                    <small>Gesetzliche Berufsbezeichnung</small>
                                </td>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <input type="text" name="wp_impressum_state" title="State"
                                           style="width: 340px" value="<?= get_option("wp_impressum_state") ?>"><br>
                                    <small>Staat, in dem die Berufsbezeichnung verliehen wurde</small>
                                </td>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <input type="text" name="wp_impressum_state_rules" title="State rules"
                                           style="width: 340px"
                                           value="<?= get_option("wp_impressum_state_rules") ?>"><br>
                                    <small>Berfusrechtliche Regelungen (Bezeichnung)</small>
                                </td>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <input type="text" name="wp_impressum_chamber" title="Chamber"
                                           style="width: 340px" value="<?= get_option("wp_impressum_chamber") ?>"><br>
                                    <small>Kammer, der Sie angehören</small>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row" colspan="2"><input type="checkbox" id="allowness" name="wp_impressum_allowness" checked="checked"> <b>Behördliche
                                        Zuslassung</b></th>
                            </tr>
                            <tr valign="top" id="allowness_textarea">
                                <td colspan="2">
                                    <textarea name="wp_impressum_responsible_chamber"
                                              style="width: 340px; height: 225px;"><?= get_option("wp_impressum_responsible_chamber") ?></textarea><br>
                                    <small>Zuständige Aufsichtsbehörde</small>
                                </td>
                            </tr>
                        </table>
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Bildquellen</b></th>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <textarea name="wp_impressum_image_source"
                                              style="width: 340px; height: 225px;"><?= get_option("wp_impressum_image_source") ?></textarea><br>
                                    <small>z.B. Max Mustermann, http://www.fotolia.com</small>
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row" colspan="2"><input type="checkbox" id="press_content" name="wp_impressum_press_content" checked="checked">
                                    <b>journalistisch-redaktionelle Inhalte</b></th>
                            </tr>
                            <tr valign="top" id="press_content_textarea">
                                <td colspan="2">
                                    <textarea name="wp_impressum_responsible_persons"
                                              style="width: 340px; height: 225px;"><?= get_option("wp_impressum_responsible_persons") ?></textarea><br>
                                    <small>Vor-, Nachname inkl. Anschrift angeben. Bei mehreren Verantwortlichen die
                                        Verantwortungen entsprechend mit angeben.
                                    </small>
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td>
                                    <a href="options-general.php?page=<?= WP_Impressum_Config::getInstance()->wpimpressum_getSlug() ?>">
                                        <input type="button" class="button button-secondary"
                                               value="<?= __("Zurück zu den Einstellungen", $this->slug) ?>"
                                               style="margin-top: 5px">
                                    </a>
                                </td>
                                <td>
                                    <a href="options-general.php?page=<?= WP_Impressum_Config::getInstance()->wpimpressum_getSlug() ?>&step=1&setup=true">
                                        <input type="button" class="button button-secondary"
                                               value="<?= __("Schritt zurück", $this->slug) ?>"
                                               style="margin-top: 5px">
                                    </a>
                                </td>
                                <td>
                                    <?= submit_button(__("Nächster Schritt", $this->slug)) ?>
                                </td>
                            </tr>
                        </table>
                    </form>

                    <?php
                    break;

                case 3:

                    if (array_key_exists("submit", $_REQUEST)) {
                        $this->wpimpressum_save_option("wp_impressum_authorized_person", $_POST["wp_impressum_authorized_person"]);
                        $this->wpimpressum_save_option("wp_impressum_vat", $_POST["wp_impressum_vat"]);
                        $this->wpimpressum_save_option("wp_impressum_register", $_POST["wp_impressum_register"]);
                        $this->wpimpressum_save_option("wp_impressum_registenr", $_POST["wp_impressum_registenr"]);
                        $this->wpimpressum_save_option("wp_impressum_regulated_profession", $_POST["wp_impressum_regulated_profession"]);
                        $this->wpimpressum_save_option("wp_impressum_state", $_POST["wp_impressum_state"]);
                        $this->wpimpressum_save_option("wp_impressum_state_rules", $_POST["wp_impressum_state_rules"]);
                        $this->wpimpressum_save_option("wp_impressum_chamber", $_POST["wp_impressum_chamber"]);
                        $this->wpimpressum_save_option("wp_impressum_image_source", $_POST["wp_impressum_image_source"]);
                        $this->wpimpressum_save_option("wp_impressum_responsible_chamber", $_POST["wp_impressum_responsible_chamber"]);
                        $this->wpimpressum_save_option("wp_impressum_responsible_persons", $_POST["wp_impressum_responsible_persons"]);
                        $this->wpimpressum_save_option("wp_impressum_press_content", $_POST["wp_impressum_press_content"]);
                        $this->wpimpressum_save_option("wp_impressum_allowness", $_POST["wp_impressum_allowness"]);
                    }

                    ?>
                    <form action="<?= $option_url ?>&finish=true&firstset=true" method="post">
                        <table class="form-table">
                            <tbody>
                            <tr>
                                <th>
                                    <?= __("Haftungsausschluss (Disclaimer)", $this->slug) ?>
                                </th>
                                <td>
                                    <label for="wp_impressum_disclaimer">
                                        <input id="wp_impressum_disclaimer" type="checkbox"
                                               name="wp_impressum_disclaimer" <?= $this->isChecked("wp_impressum_disclaimer") ?>>
                                        <?= __("Füge einen Disclaimer in dein Impressum ein.", $this->slug) ?>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?= __("Allgemine Datenschutzerklärung", $this->slug) ?>
                                </th>
                                <td>
                                    <label for="wp_impressum_general_privacy_policy">
                                        <input id="wp_impressum_general_privacy_policy" type="checkbox"
                                               name="wp_impressum_general_privacy_policy" <?= $this->isChecked("wp_impressum_general_privacy_policy") ?>>
                                        <?= __("Füge eine allgemeine Datenschutzerklärung in dein Impressum ein.", $this->slug) ?>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?= __("Datenschutzerklärung für Facebook", $this->slug) ?>
                                </th>
                                <td>
                                    <label for="wp_impressum_policy_facebook">
                                        <input id="wp_impressum_policy_facebook" type="checkbox"
                                               name="wp_impressum_policy_facebook" <?= $this->isChecked("wp_impressum_policy_facebook") ?>>
                                        <?= __("Füge eine Datenschutzerklärung für die Nutzung von Facebook Elementen in dein Impressum ein.", $this->slug) ?>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?= __("Datenschutzerklärung für Google", $this->slug) ?>
                                </th>
                                <td>
                                    <label for="wp_impressum_policy_google_analytics">
                                        <input id="wp_impressum_policy_google_analytics" type="checkbox"
                                               name="wp_impressum_policy_google_analytics" <?= $this->isChecked("wp_impressum_policy_google_analytics") ?>>
                                        <?= __("Füge eine Datenschutzerklärung für die Nutzung von <b>Google Analytics</b> in dein Impressum ein.", $this->slug) ?>
                                    </label>
                                    <br><br>
                                    <label for="wp_impressum_policy_google_adsense">
                                        <input id="wp_impressum_policy_google_adsense" type="checkbox"
                                               name="wp_impressum_policy_google_adsense" <?= $this->isChecked("wp_impressum_policy_google_adsense") ?>>
                                        <?= __("Füge eine Datenschutzerklärung für die Nutzung von <b>Google Adsense</b> in dein Impressum ein.", $this->slug) ?>
                                    </label>
                                    <br><br>
                                    <label for="wp_impressum_policy_google_plus">
                                        <input id="wp_impressum_policy_google_plus" type="checkbox"
                                               name="wp_impressum_policy_google_plus" <?= $this->isChecked("wp_impressum_policy_google_plus") ?>>
                                        <?= __("Füge eine Datenschutzerklärung für die Nutzung von <b>Google +1</b> in dein Impressum ein.", $this->slug) ?>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?= _e("Datenschutzerklärung für Twitter") ?>
                                </th>
                                <td>
                                    <label for="wp_impressum_policy_twitter">
                                        <input id="wp_impressum_policy_twitter" type="checkbox"
                                               name="wp_impressum_policy_twitter" <?= $this->isChecked("wp_impressum_policy_twitter") ?>>
                                        <?= __("Füge eine Datenschutzerklärung für die Nutzung von Twitter Elementen in dein Impressum ein.", $this->slug) ?>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?= __("Zusatzfeld", $this->slug) ?>
                                </th>
                                <td>
                                    <textarea style="width:500px; height: 200px;"
                                              name="wp_impressum_extra_field"></textarea>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table>
                            <tr>
                                <td>
                                    <a href="options-general.php?page=<?= WP_Impressum_Config::getInstance()->wpimpressum_getSlug() ?>">
                                        <input type="button" class="button button-secondary"
                                               value="<?= __("Zurück zu den Einstellungen", $this->slug) ?>"
                                               style="margin-top: 5px">
                                    </a>
                                </td>
                                <td>
                                    <a href="options-general.php?page=<?= WP_Impressum_Config::getInstance()->wpimpressum_getSlug() ?>&step=2&setup=true">
                                        <input type="button" class="button button-secondary"
                                               value="<?= __("Schritt zurück", $this->slug) ?>"
                                               style="margin-top: 5px">
                                    </a>
                                </td>
                                <td>
                                    <?= submit_button(__("Daten speichern", $this->slug)) ?>
                                </td>
                            </tr>
                        </table>
                    </form>

                    <?php

                    break;

                default:
                    $this->wpimpressum_config_view();
            }
        } else {
            $this->wpimpressum_config_view();
        }
    }

    private function wpimpressum_register_settings()
    {
        register_setting("wp-impressum-conf-1", "wp_impressum_person");

        register_setting("wp-impressum-conf-1", "wp_impressum_form_of_organization");
        register_setting("wp-impressum-conf-1", "wp_impressum_name_company");
        register_setting("wp-impressum-conf-1", "wp_impressum_address");
        register_setting("wp-impressum-conf-1", "wp_impressum_address_extra");
        register_setting("wp-impressum-conf-1", "wp_impressum_place");
        register_setting("wp-impressum-conf-1", "wp_impressum_zip");
        register_setting("wp-impressum-conf-1", "wp_impressum_country");
        register_setting("wp-impressum-conf-1", "wp_impressum_fax");
        register_setting("wp-impressum-conf-1", "wp_impressum_email");
        register_setting("wp-impressum-conf-1", "wp_impressum_phone");

        register_setting("wp-impressum-conf", "wp_impressum_authorized_person");

        register_setting("wp-impressum-conf", "wp_impressum_vat");
        register_setting("wp-impressum-conf", "wp_impressum_register");
        register_setting("wp-impressum-conf", "wp_impressum_registenr");

        register_setting("wp-impressum-conf", "wp_impressum_regulated_profession");
        register_setting("wp-impressum-conf", "wp_impressum_state");
        register_setting("wp-impressum-conf", "wp_impressum_state_rules");
        register_setting("wp-impressum-conf", "wp_impressum_chamber");

        register_setting("wp-impressum-conf", "wp_impressum_image_source");
        register_setting("wp-impressum-conf", "wp_impressum_responsible_chamber");
        register_setting("wp-impressum-conf", "wp_impressum_responsible_persons");

        register_setting("wp-impressum-policy_group", "wp_impressum_disclaimer");
        register_setting("wp-impressum-policy_group", "wp_impressum_set_impressum");
        register_setting("wp-impressum-policy_group", "wp_impressum_language_of_impressum");
        register_setting("wp-impressum-policy_group", "wp_impressum_general_privacy_policy");
        register_setting("wp-impressum-policy_group", "wp_impressum_policy_facebook");
        register_setting("wp-impressum-policy_group", "wp_impressum_policy_google_analytics");
        register_setting("wp-impressum-policy_group", "wp_impressum_policy_google_adsense");
        register_setting("wp-impressum-policy_group", "wp_impressum_policy_twitter");
        register_setting("wp-impressum-policy_group", "wp_impressum_policy_google_plus");
        register_setting("wp-impressum-policy_group", "wp_impressum_page");
        register_setting("wp-impressum-policy_group", "wp_impressum_disabled");
        register_setting("wp-impressum-policy_group", "wp_impressum_extra_field");
    }

    private function wpimpressum_config_view()
    {

        $wpimpressum_settings[] = $wpimpressum_language = mysql_real_escape_string($_POST['wp_impressum_language_of_impressum']);
        $wpimpressum_settings[] = $general_privacy_policy = mysql_real_escape_string($_POST['wp_impressum_general_privacy_policy']);
        $wpimpressum_settings[] = $disclaimer = mysql_real_escape_string($_POST['wp_impressum_disclaimer']);
        $wpimpressum_settings[] = $policy_facebook = mysql_real_escape_string($_POST['wp_impressum_policy_facebook']);
        $wpimpressum_settings[] = $policy_google_analytics = mysql_real_escape_string($_POST['wp_impressum_policy_google_analytics']);
        $wpimpressum_settings[] = $policy_google_adsense = mysql_real_escape_string($_POST['wp_impressum_policy_google_adsense']);
        $wpimpressum_settings[] = $policy_google_plus = mysql_real_escape_string($_POST['wp_impressum_policy_google_plus']);
        $wpimpressum_settings[] = $policy_google_twitter = mysql_real_escape_string($_POST['wp_impressum_policy_twitter']);
        $wpimpressum_settings[] = $extra_field = mysql_real_escape_string($_POST['wp_impressum_extra_field']);

        if (array_key_exists("firstset", $_GET) && $_GET['finish'] == true && array_key_exists("submit", $_REQUEST)) {
            $this->wpimpressum_save_option("wp_impressum_language_of_impressum", $wpimpressum_language);
            $this->wpimpressum_save_option("wp_impressum_general_privacy_policy", $general_privacy_policy);
            $this->wpimpressum_save_option("wp_impressum_disclaimer", $disclaimer);
            $this->wpimpressum_save_option("wp_impressum_policy_facebook", $policy_facebook);
            $this->wpimpressum_save_option("wp_impressum_policy_google_analytics", $policy_google_analytics);
            $this->wpimpressum_save_option("wp_impressum_policy_google_adsense", $policy_google_adsense);
            $this->wpimpressum_save_option("wp_impressum_policy_google_plus", $policy_google_plus);
            $this->wpimpressum_save_option("wp_impressum_policy_twitter", $policy_google_twitter);
            $this->wpimpressum_save_option("wp_impressum_extra_field", $policy_google_twitter);
        }

        ?>
        <form action="options-general.php">
            <table class="form-table">
                <input type="hidden" name="page"
                       value="<?= WP_Impressum_Config::getInstance()->wpimpressum_getSlug() ?>">
                <input type="hidden" name="step" value="1"/>
                <input type="hidden" name="setup" value="true"/>
                <tbody>
                <tr>
                    <th>
                        Impressum Konfiguration
                    </th>
                    <td>
                        <input class="button" type="submit" value="<?= _e('Impressum konfigurieren') ?>">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
        <form method="post" action="options.php">
            <?php settings_fields('wp-impressum-policy_group'); ?>
            <?php do_settings_sections('wp-impressum-policy_group'); ?>
            <table class="form-table">
                <tbody>
                <tr>
                    <th scope="row"><?= __("Language", $this->slug) ?></th>
                    <td>
                        <select name="wp_impressum_language_of_impressum" style="width: 340px">
                            <option>Wähle dein Land ...</option>
                            <option value="DE" <?php
                            if (get_option("wp_impressum_language_of_impressum") == "DE") {
                                echo "selected=selected";
                            }
                            ?>>Deutsch
                            </option>
                        </select><br><br>
                        <?= __("Wähle die Sprache für dein Impressum", $this->slug) ?>
                    </td>
                </tr>
                <tr>
                    <th colspan="2"><h2><?= __("Impressum Inhalt Einstellungen", $this->slug) ?></h2></th>
                </tr>
                <tr>
                    <th>
                        <?= __("Haftungsausschluss (Disclaimer)", $this->slug) ?>
                    </th>
                    <td>
                        <label for="wp_impressum_disclaimer">
                            <input id="wp_impressum_disclaimer" type="checkbox"
                                   name="wp_impressum_disclaimer" <?= $this->isChecked("wp_impressum_disclaimer") ?>>
                            <?= __("Füge einen Disclaimer in dein Impressum ein.", $this->slug) ?>
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __("Allgemine Datenschutzerklärung", $this->slug) ?>
                    </th>
                    <td>
                        <label for="wp_impressum_general_privacy_policy">
                            <input id="wp_impressum_general_privacy_policy" type="checkbox"
                                   name="wp_impressum_general_privacy_policy" <?= $this->isChecked("wp_impressum_general_privacy_policy") ?>>
                            <?= __("Füge eine allgemeine Datenschutzerklärung in dein Impressum ein.", $this->slug) ?>
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __("Datenschutzerklärung für Facebook", $this->slug) ?>
                    </th>
                    <td>
                        <label for="wp_impressum_policy_facebook">
                            <input id="wp_impressum_policy_facebook" type="checkbox"
                                   name="wp_impressum_policy_facebook" <?= $this->isChecked("wp_impressum_policy_facebook") ?>>
                            <?= __("Füge eine Datenschutzerklärung für die Nutzung von Facebook Elementen in dein Impressum ein.", $this->slug) ?>
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __("Datenschutzerklärung für Google", $this->slug) ?>
                    </th>
                    <td>
                        <label for="wp_impressum_policy_google_analytics">
                            <input id="wp_impressum_policy_google_analytics" type="checkbox"
                                   name="wp_impressum_policy_google_analytics" <?= $this->isChecked("wp_impressum_policy_google_analytics") ?>>
                            <?= __("Füge eine Datenschutzerklärung für die Nutzung von <b>Google Analytics</b> in dein Impressum ein.", $this->slug) ?>
                        </label>
                        <br><br>
                        <label for="wp_impressum_policy_google_adsense">
                            <input id="wp_impressum_policy_google_adsense" type="checkbox"
                                   name="wp_impressum_policy_google_adsense" <?= $this->isChecked("wp_impressum_policy_google_adsense") ?>>
                            <?= __("Füge eine Datenschutzerklärung für die Nutzung von <b>Google Adsense</b> in dein Impressum ein.", $this->slug) ?>
                        </label>
                        <br><br>
                        <label for="wp_impressum_policy_google_plus">
                            <input id="wp_impressum_policy_google_plus" type="checkbox"
                                   name="wp_impressum_policy_google_plus" <?= $this->isChecked("wp_impressum_policy_google_plus") ?>>
                            <?= __("Füge eine Datenschutzerklärung für die Nutzung von <b>Google +1</b> in dein Impressum ein.", $this->slug) ?>
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= _e("Datenschutzerklärung für Twitter") ?>
                    </th>
                    <td>
                        <label for="wp_impressum_policy_twitter">
                            <input id="wp_impressum_policy_twitter" type="checkbox"
                                   name="wp_impressum_policy_twitter" <?= $this->isChecked("wp_impressum_policy_twitter") ?>>
                            <?= __("Füge eine Datenschutzerklärung für die Nutzung von Twitter Elementen in dein Impressum ein.", $this->slug) ?>
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __("Zusatzfeld", $this->slug) ?>
                    </th>
                    <td>
                        <textarea style="width:500px; height: 200px;" name="wp_impressum_extra_field"><?= get_option("wp_impressum_extra_field") ?></textarea>
                    </td>
                </tr>
                </tbody>
            </table>
            <?php submit_button(__("Impressum aktualisieren")); ?>
        </form>
    <?php


    }

    private function isChecked($key)
    {
        if (strlen(get_option($key)) > 0) {
            echo "checked=checked";
        }
    }
}
