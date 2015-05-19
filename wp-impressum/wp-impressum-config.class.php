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
        $this->version = "0.4.0";
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
            add_action('wp_ajax_wp_impressum_delete_options', array($this, 'wp_impressum_delete_callback'));
        }
    }

    /**
     * ajax response for DEV options
     * TODO: Delete before release to Wordpress
     */
    function wp_impressum_delete_callback()
    {
        echo "OK";
        require_once plugin_dir_path(__FILE__) . "../uninstall.php";
        die();
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
        <script>
            (function ($) {
                $(document).ready(function () {
                    $("#delete_options").click(function () {
                        var data = {
                            'action': 'wp_impressum_delete_options',
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
            <h2>WP Impressum</h2>
            <small>Version: <?= $this->version ?></small>
            |
            <small><a href="javascript:void(0);" id="delete_options">Delete options</a></small>
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

    private function wpimpressum_config_page_1($option_url, $show_buttons)
    {
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
        <?php if ($show_buttons) { ?>
        <a href="<?= $option_url ?>">
            <input type="button" class="button button-secondary"
                   value="<?= __("Zurück zu den Einstellungen", $this->slug) ?>">
        </a>

    <?php } ?>

        <form action="<?= $option_url ?>&setup=true&step=2" method="post">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row" colspan="2"><b><?= __("Art der Person", $this->slug) ?></b></th>
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
                    <td><?= __("Juristische Person (z.B. Firma, Verein, Organisation, Einrichtung)") ?></td>
                </tr>
            </table>
            <table class="form-table">
                <tr valign="top" class="rechtsform">
                    <th scope="row" colspan="2" style="width: 300px"><b><?= __("Rechtsform") ?></b></th>
                </tr>
                <tr valign="top" class="rechtsform">
                    <td colspan="2">
                        <select name="wp_impressum_form_of_organization">
                            <?php
                            $forms_of_organization = array(
                                __("Einzelunternehmen", $this->slug),
                                __("Stille Gesellschaft", $this->slug),
                                __("Offene Handelsgesellschaft (OHG)", $this->slug),
                                __("Kommanditgesellschaft (KG)", $this->slug),
                                __("Gesellschaft bürgerlichen Rechts (GdR)", $this->slug),
                                __("Aktiengesellschaft (AG)", $this->slug),
                                __("Kommanditgesellschaft auf Aktien (KGaA)", $this->slug),
                                __("Gesellschaft mit beschränkter Haftung (GmbH)", $this->slug),
                                __("Genossenschaft (eG)", $this->slug)
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
                    <th scope="row" colspan="2"><b><?= __("Angaben zur Organisation", $this->slug) ?></b></th>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="text" style="width: 340px" name="wp_impressum_name_company"
                               title="Company Name"
                               value="<?= get_option("wp_impressum_name_company") ?>"><br>
                        <small id="full_name"><?= __("Vollständiger Name", $this->slug) ?></small>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="text" name="wp_impressum_address" title="Address" style="width: 340px"
                               value="<?= get_option("wp_impressum_address") ?>"><br>
                        <small><?= __("Straße & Hausnummer", $this->slug) ?></small>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="text" name="wp_impressum_address_extra" title="Address Extra"
                               style="width: 340px" value="<?= get_option("wp_impressum_address_extra") ?>"><br>
                        <small><?= __("Adresszusatz", $this->slug) ?></small>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table>
                            <tr>
                                <td style="padding: 0;"><input type="text" name="wp_impressum_place"
                                                               title="Place"
                                                               value="<?= get_option("wp_impressum_place") ?>"><br>
                                    <small><?= __("Ort") ?></small>
                                </td>
                                <td style="padding: 0;"><input type="text" name="wp_impressum_zip"
                                                               title="ZIP Code"
                                                               value="<?= get_option("wp_impressum_zip") ?>"><br>
                                    <small><?= __("PLZ") ?></small>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <select name="wp_impressum_country" style="width: 340px">
                            <option value="no_land_choosen"><?= __("Wähle dein Land ...") ?></option>
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
                        <b><?= __("Telefonnummer (inkl. Vorwahl)", $this->slug) ?></b>
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
                        <b><?= __("Faxnummer (optional)", $this->slug) ?></b>
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
                        <b><?= __("E-Mail Adresse", $this->slug) ?></b>
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
            <?php if ($show_buttons) { ?>
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
                </table><?php } ?>
        </form>

    <?php
    }

    private function wpimpressum_config_page_2($option_url, $show_buttons, $last_page = false)
    {

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
                    <th scope="row" colspan="2"><b><?= __("Vertretungsberechtigte Persone(n)", $this->slug) ?></b>
                    </th>
                </tr>
                <tr valign="top">
                    <td colspan="2">
                                    <textarea name="wp_impressum_authorized_person"
                                              style="width: 340px; height: 225px;"><?= get_option("wp_impressum_authorized_person") ?></textarea><br>
                        <small><?= __("Namen und Vornamen", $this->slug) ?></small>
                    </td>
                </tr>
            </table>
            <table class="form-table">
                <tr valign="top" <?= $cssDef ?>>
                    <th scope="row" colspan="2"><b><?= __("Umsatzsteuer ID", $this->slug) ?></b></th>
                </tr>
                <tr valign="top" <?= $cssDef ?>>
                    <td colspan="2">
                        <input type="text" name="wp_impressum_vat" title="VAT" style="width: 340px"
                               value="<?= get_option("wp_impressum_vat") ?>">
                    </td>
                </tr>
                <tr valign="top" <?= $cssDef ?>>
                    <th scope="row" colspan="2"><b><?= __("Register", $this->slug) ?></b></th>
                </tr>
                <tr valign="top" <?= $cssDef ?>>
                    <td colspan="2">
                        <select name="wp_impressum_register">
                            <?php
                            $registerDescr = array(
                                __("Kein Register", $this->slug),
                                __("Genossenschaftsregister", $this->slug),
                                __("Handelsregister", $this->slug),
                                __("Partnerschaftsregister", $this->slug),
                                __("Vereinsregister", $this->slug)
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
                    <th scope="row" colspan="2"><b><?= __("Registernummer", $this->slug) ?></b></th>
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
                    <th scope="row" colspan="2"><input type="checkbox" id="regulated_profession"
                                                       name="wp_impressum_regulated_profession_checked" <?= $this->isChecked("wp_impressum_regulated_profession_checked") ?>><label
                            for="regulated_profession"><b><?= __("Reglementierter Beruf", $this->slug) ?></b></label>
                    </th>
                </tr>
                <tr valign="top" class="hide_regulated_profession">
                    <td colspan="2">
                        <input type="text" name="wp_impressum_regulated_profession"
                               title="Regulated profession"
                               style="width: 340px"
                               value="<?= get_option("wp_impressum_regulated_profession") ?>"><br>
                        <small><?= __("Gesetzliche Berufsbezeichnung", $this->slug) ?></small>
                    </td>
                </tr>
                <tr valign="top" class="hide_regulated_profession">
                    <td colspan="2">
                        <input type="text" name="wp_impressum_state" title="State"
                               style="width: 340px" value="<?= get_option("wp_impressum_state") ?>"><br>
                        <small><?= __("Staat, in dem die Berufsbezeichnung verliehen wurde", $this->slug) ?></small>
                    </td>
                </tr>
                <tr valign="top" class="hide_regulated_profession">
                    <td colspan="2">
                        <input type="text" name="wp_impressum_state_rules" title="State rules"
                               style="width: 340px"
                               value="<?= get_option("wp_impressum_state_rules") ?>"><br>
                        <small><?= __("Berfusrechtliche Regelungen (Bezeichnung)", $this->slug) ?></small>
                    </td>
                </tr>
                <tr valign="top" class="hide_regulated_profession">
                    <td colspan="2">
                        <input type="text" name="wp_impressum_chamber" title="Chamber"
                               style="width: 340px" value="<?= get_option("wp_impressum_chamber") ?>"><br>
                        <small><?= __("Kammer, der Sie angehören", $this->slug) ?></small>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" colspan="2"><input type="checkbox" id="allowness"
                                                       name="wp_impressum_allowness" <?= $this->isChecked("wp_impressum_allowness") ?>><label
                            for="allowness"><b><?= __("Behördliche Zuslassung", $this->slug) ?></b></label></th>
                </tr>
                <tr valign="top" id="allowness_textarea">
                    <td colspan="2">
                                    <textarea name="wp_impressum_responsible_chamber"
                                              style="width: 340px; height: 225px;"><?= get_option("wp_impressum_responsible_chamber") ?></textarea><br>
                        <small><?= __("Zuständige Aufsichtsbehörde", $this->slug) ?></small>
                    </td>
                </tr>
            </table>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row" colspan="2"><b><?= __("Bildquellen", $this->slug) ?></b></th>
                </tr>
                <tr valign="top">
                    <td colspan="2">
                                    <textarea name="wp_impressum_image_source"
                                              style="width: 340px; height: 225px;"><?= get_option("wp_impressum_image_source") ?></textarea><br>
                        <small><?= __("z.B. Max Mustermann, http://www.fotolia.com", $this->slug) ?></small>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row" colspan="2"><input type="checkbox" id="press_content"
                                                       name="wp_impressum_press_content" <?= $this->isChecked("wp_impressum_press_content") ?>
                        <label
                            for="press_content"><b><?= __("journalistisch-redaktionelle Inhalte", $this->slug) ?></b></label>
                    </th>
                </tr>
                <tr valign="top" id="press_content_textarea">
                    <td colspan="2">
                                    <textarea name="wp_impressum_responsible_persons"
                                              style="width: 340px; height: 225px;"><?= get_option("wp_impressum_responsible_persons") ?></textarea><br>
                        <small><?= __("Vor-, Nachname inkl. Anschrift angeben. Bei mehreren Verantwortlichen die
                                        Verantwortungen entsprechend mit angeben.", $this->slug) ?>
                        </small>
                    </td>
                </tr>
            </table>
            <?php if ($show_buttons) { ?>
                <table>
                    <tr>
                        <td>
                            <a href="options-general.php?page=<?= WP_Impressum_Config::getInstance()->wpimpressum_getSlug() ?>">
                                <input type="button" class="button button-secondary"
                                       value="<?= __("Zurück zu den Einstellungen", $this->slug) ?>"
                                       style="margin-top: 5px">
                            </a>
                        </td>
                        <?php if (!$last_page) { ?>
                        <td>
                            <a href="options-general.php?page=<?= WP_Impressum_Config::getInstance()->wpimpressum_getSlug() ?>&step=1&setup=true">
                                <input type="button" class="button button-secondary"
                                       value="<?= __("Schritt zurück", $this->slug) ?>"
                                       style="margin-top: 5px">
                            </a>
                        </td>
                        <?php } ?>
                        <?php if (!$last_page) { ?>
                            <td>
                                <?= submit_button(__("Nächster Schritt", $this->slug)) ?>
                            </td>
                        <?php } else { ?>
                            <td>
                                <?= submit_button(__("Daten speichern", $this->slug)) ?>
                            </td>
                        <?php } ?>
                    </tr>
                </table>
            <?php } ?>
        </form>

    <?php
    }

    private function wpimpressum_config_page_3($option_url, $show_buttons)
    {
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
                                              name="wp_impressum_extra_field"><?= get_option("wp_impressum_extra_field") ?></textarea>
                    </td>
                </tr>
                </tbody>
            </table>
            <?php if ($show_buttons) { ?>
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
            <?php } ?>
        </form>

    <?php
    }

    public
    function wpimpressum_show_setup()
    {
        $onboarded = get_option("wp_impresusm_onboarding_conf");
        $enter_config = true;
        $finish = $_GET['finish'];

        if($finish == "true") {
            if ($onboarded == "onboarded") {
                $enter_config = false;
            } else {
                add_option("wp_impresusm_onboarding_conf", "onboarded");
                $_GET['step'] = 1;
            }
            update_option("wp_impresusm_onboarding_conf", "onboarded");
        }

        if ($onboarded == "onboarded") {
            $enter_config = false;
        }

        if (empty($finish) && (array_key_exists("setup", $_REQUEST) || $enter_config)) {

            // dismiss admin notice
            if (get_option("wp_impressum_notice") === false) {
                add_option("wp_impressum_notice", "dismissed");
            } else {
                update_option("wp_impressum_notice", "dismissed");
            }

            $option_url = admin_url("options-general.php") . "?page=" . WP_Impressum_Config::getInstance()->wpimpressum_getSlug();

            if ($enter_config) {
                switch ($_GET['step']) {
                    case 1:

                        $this->wpimpressum_config_page_1($option_url, true);

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

                        $this->wpimpressum_config_page_2($option_url, true);

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
                            $this->wpimpressum_save_option("wp_impressum_regulated_profession_checked", $_POST['wp_impressum_regulated_profession_checked']);
                        }

                        $this->wpimpressum_config_page_3($option_url, true);

                        break;

                    default:
                        $this->wpimpressum_config_view();
                }
            } else {
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
                    $this->wpimpressum_save_option("wp_impressum_regulated_profession_checked", $_POST['wp_impressum_regulated_profession_checked']);

                }

                $this->wpimpressum_config_page_1($option_url, false);
                $this->wpimpressum_config_page_2($option_url, true, true);
            }
        } else {
            $this->wpimpressum_config_view();
        }
    }

    private function wpimpressum_register_settings()
    {
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
        register_setting("wp-impressum-policy_group", "wp_impressum_noindex");
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
            $this->wpimpressum_save_option("wp_impressum_extra_field", $extra_field);
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
                    <th scope="row"><?= __("No Index", $this->slug) ?></th>
                    <td>
                        <label for="wp_impressum_noindex">
                            <input id="wp_impressum_noindex" type="checkbox"
                                   name="wp_impressum_noindex" <?= $this->isChecked("wp_impressum_noindex") ?>>
                            <?= __("Lass die Impressum Seite nicht von Suchmaschinen indexieren.", $this->slug) ?>
                        </label>
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
                        <textarea style="width:500px; height: 200px;"
                                  name="wp_impressum_extra_field"><?= get_option("wp_impressum_extra_field") ?></textarea>
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
