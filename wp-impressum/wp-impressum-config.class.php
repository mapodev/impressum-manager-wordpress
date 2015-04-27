<?php

class WPImpressumConfig
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
        $this->version = "0.0.1";
        $this->slug = "wp-impressum-plugin";

        if (is_admin()) {
            add_action('admin_menu', array($this, 'wpi_addmenu'));
        }
    }

    public function wpi_addmenu()
    {
        add_options_page("WP Impressum", 'WP Impressum', 'manage_options', $this->wpi_getSlug(), array($this, 'wpi_show'), 99.5);
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new WPImpressumConfig();
        }
        return self::$instance;
    }

    /**
     * @return mixed
     */
    public function wpi_getSlug()
    {
        return $this->slug;
    }

    /**
     * @return mixed
     */
    public function wpi_getVersion()
    {
        return $this->version;
    }

    public function wpi_show()
    {
        ?>
        <div class="wrap">
            <h2>WP Impressum</h2>
            <?php
            $this->wpi_show_setup();
            ?>
        </div>
    <?php
    }


    public function wpi_show_setup()
    {

        if (array_key_exists("setup", $_GET)) {
            $step = $_GET['step'];
            switch ($step) {
                case 1:
                    ?>
                    <form
                        action="options-general.php?page=<?= WPImpressumConfig::getInstance()->wpi_getSlug() ?>&step=2&setup=true"
                        method="post">
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Art der Person</b></th>
                            </tr>
                            <tr valign="top">
                                <td width="5"><input type="radio" name="person" value="1"></td>
                                <td>Privatperson</td>
                            </tr>
                            <tr valign="top">
                                <td><input type="radio" name="person" value="2"></td>
                                <td>Juristische Person (z.B. Firma, Verein, Organisation, Einrichtung)</td>
                            </tr>
                        </table>
                        <?= submit_button("Nächster Schritt") ?>
                    </form>
                    <?php


                    break;

                case 2:
                    ?>

                    <form
                        action="options-general.php?page=<?= WPImpressumConfig::getInstance()->wpi_getSlug() ?>&step=3&setup=true"
                        method="post">
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row" colspan="2" style="width: 300px"><b>Rechtsform</b></th>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <select>
                                        <option>Einzelunternehmen</option>
                                        <option>Stille Gesellschaft</option>
                                        <option>Offene Handelsgesellschaft (OHG)</option>
                                        <option>Kommanditgesellschaft (KG)</option>
                                        <option>Gesellschaft bürgerlichen Rechts (GdR)</option>
                                        <option>Aktiengesellschaft (AG)</option>
                                        <option>Kommanditgesellschaft auf Aktien (KGaA)</option>
                                        <option>Gesellschaft mit beschränkter Haftung (GmbH)</option>
                                        <option>Genossenschaft (eG)</option>
                                    </select>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Angaben zur Organisation</b></th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="text" style="width: 340px" name="name-company"
                                           title="Company Name"><br>
                                    <small>Vollständiger Name</small>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="text" name="address" title="Address" style="width: 340px"><br>
                                    <small>Straße & Hausnummer</small>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="text" name="address-extra" title="Address Extra"
                                           style="width: 340px"><br>
                                    <small>Adresszusatz</small>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td style="padding: 0;"><input type="text" name="place" title="Place"><br>
                                                <small>Ort</small>
                                            </td>
                                            <td style="padding: 0;"><input type="text" name="zip" title="ZIP Code"><br>
                                                <small>PLZ</small>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select name="country" style="width: 340px">
                                        <option>Wähle dein Land ...</option>
                                        <?php

                                        foreach ($this->_countries as $country_code => $country_name) {
                                            ?>
                                            <option value="<?= $country_code ?>"><?= __($country_name) ?></option>
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
                                    <input type="text" name="phone" title="Phone Number" style="width: 340px">
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <b>Faxnummer (optional)</b>
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="text" name="fax" title="Fax Number" style="width: 340px">
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <b>E-Mail Adresse</b>
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="text" name="fax" title="E-Mail Address" style="width: 340px">
                                </td>
                            </tr>
                        </table>
                        <?= submit_button("Nächster Schritt") ?>
                    </form>

                    <?php

                    break;

                case 3:

                    ?>
                    <form
                        action="options-general.php?page=<?= WPImpressumConfig::getInstance()->wpi_getSlug() ?>&step=4&setup=true"
                        method="post">
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Vertretungsberechtigte Persone(n)</b></th>
                            </tr>
                            <tr valign="top">
                               <textarea  style="width: 340px; height: 225px;">

                               </textarea><br>
                                <small>Namen und Vornamen</small>
                            </tr>
                        </table>
                        <?= submit_button("Nächster Schritt") ?>
                    </form>
                    <?php

                    break;

                case 4:

                    ?>
                    <form
                        action="options-general.php?page=<?= WPImpressumConfig::getInstance()->wpi_getSlug() ?>&step=5&setup=true"
                        method="post">
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Umsatzsteuer ID</b></th>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <input type="text" name="umsatzseteuer" title="Umsatzseteuer" style="width: 340px">
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Register</b></th>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <select>
                                        <option>keines</option>
                                        <option>kein plan</option>
                                        <option>noch irgendwas vlt</option>
                                    </select>
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Registernummer</b></th>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <input type="text" name="registernr" title="Registernummer" style="width: 340px">
                                </td>
                            </tr>
                        </table>
                        <?= submit_button("Nächster Schritt") ?>
                    </form>
                    <?php

                    break;

                case 5:

                    ?>
                    <form
                        action="options-general.php?page=<?= WPImpressumConfig::getInstance()->wpi_getSlug() ?>&step=6&setup=true"
                        method="post">
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Umsatzsteuer ID</b></th>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <input type="text" name="umsatzseteuer" title="Umsatzseteuer" style="width: 340px">
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Register</b></th>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <select>
                                        <option>keines</option>
                                        <option>kein plan</option>
                                        <option>noch irgendwas vlt</option>
                                    </select>
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Registernummer</b></th>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <input type="text" name="registernr" title="Registernummer" style="width: 340px">
                                </td>
                            </tr>
                        </table>
                        <?= submit_button("Nächster Schritt") ?>
                    </form>
                    <?php

                    break;
                default:
                    $this->wpi_config_view();
                    break;
            }
        }
    }

    private function wpi_config_view()
    {

    }

}
