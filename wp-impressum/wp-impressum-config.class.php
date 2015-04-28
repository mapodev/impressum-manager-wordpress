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

                    $fields2 = array();

                    $fields2[] = $kind_of_person = mysql_real_escape_string($_POST['person']);

                    print_r($fields2);

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
                                    <select name="form_of_organization">
                                        <option value="1">Einzelunternehmen</option>
                                        <option value="2">Stille Gesellschaft</option>
                                        <option value="3">Offene Handelsgesellschaft (OHG)</option>
                                        <option value="4">Kommanditgesellschaft (KG)</option>
                                        <option value="5">Gesellschaft bürgerlichen Rechts (GdR)</option>
                                        <option value="6">Aktiengesellschaft (AG)</option>
                                        <option value="7">Kommanditgesellschaft auf Aktien (KGaA)</option>
                                        <option value="8">Gesellschaft mit beschränkter Haftung (GmbH)</option>
                                        <option value="9">Genossenschaft (eG)</option>
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
                                    <input type="text" name="email" title="E-Mail Address" style="width: 340px">
                                </td>
                            </tr>
                        </table>
                        <?= submit_button("Nächster Schritt") ?>
                    </form>

                    <?php

                    break;

                case 3:

                    $fields3 = array();

                    $fields3[] = $form_of_organization = mysql_real_escape_string($_POST['form_of_organization']);
                    $fields3[] = $name_company = mysql_real_escape_string($_POST['name-company']);
                    $fields3[] = $address = mysql_real_escape_string($_POST['address']);
                    $fields3[] = $address_extra = mysql_real_escape_string($_POST['address-extra']);
                    $fields3[] = $place = mysql_real_escape_string($_POST['place']);
                    $fields3[] = $zip = mysql_real_escape_string($_POST['zip']);
                    $fields3[] = $country = mysql_real_escape_string($_POST['country']);
                    $fields3[] = $phone = mysql_real_escape_string($_POST['phone']);
                    $fields3[] = $fax = mysql_real_escape_string($_POST['fax']);
                    $fields3[] = $email = mysql_real_escape_string($_POST['email']);

                    print_r($fields3);

                    ?>
                    <form
                        action="options-general.php?page=<?= WPImpressumConfig::getInstance()->wpi_getSlug() ?>&step=4&setup=true"
                        method="post">
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Vertretungsberechtigte Persone(n)</b></th>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <textarea name="authorized_person"
                                              style="width: 340px; height: 225px;"></textarea><br>
                                    <small>Namen und Vornamen</small>
                                </td>
                            </tr>
                        </table>
                        <?= submit_button("Nächster Schritt") ?>
                    </form>
                    <?php

                    break;

                case 4:

                    $fields4 = array();

                    $fields4[] = $authorized_person = mysql_real_escape_string($_POST['authorized_person']);

                    print_r($fields4);

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
                                    <input type="text" name="vat" title="VAT" style="width: 340px">
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Register</b></th>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <select namer="register">
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

                    $fields5 = array();

                    $fields5[] = $vat = mysql_real_escape_string($_POST['vat']);
                    $fields5[] = $reigster = mysql_real_escape_string($_POST['register']);
                    $fields5[] = $registernr = mysql_real_escape_string($_POST['registernr']);

                    print_r($fields5);

                    ?>
                    <form
                        action="options-general.php?page=<?= WPImpressumConfig::getInstance()->wpi_getSlug() ?>&step=6&setup=true"
                        method="post">
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Reglementierter Beruf</b></th>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <input type="text" name="regulated_profession" title="Regulated profession"
                                           style="width: 340px"><br>
                                    <small>Gesetzliche Berufsbezeichnung</small>
                                </td>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <input type="text" name="state" title="State"
                                           style="width: 340px"><br>
                                    <small>Staat, in dem die Berufsbezeichnung verliehen wurde</small>
                                </td>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <input type="text" name="state_rules" title="State rules"
                                           style="width: 340px"><br>
                                    <small>Berfusrechtliche Regelungen (Bezeichnung)</small>
                                </td>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <input type="text" name="chamber" title="Chamber"
                                           style="width: 340px"><br>
                                    <small>Kammer, der Sie angehören</small>
                                </td>
                            </tr>
                        </table>
                        <?= submit_button("Nächster Schritt") ?>
                    </form>
                    <?php

                    break;

                case 6:

                    $fields6 = array();

                    $fields6[] = $regulated_profession = mysql_real_escape_string($_POST['regulated_profession']);
                    $fields6[] = $state = mysql_real_escape_string($_POST['state']);
                    $fields6[] = $state_rules = mysql_real_escape_string($_POST['state_rules']);
                    $fields6[] = $chamber = mysql_real_escape_string($_POST['chamber']);

                    print_r($fields6);

                    ?>
                    <form
                        action="options-general.php?page=<?= WPImpressumConfig::getInstance()->wpi_getSlug() ?>&step=7&setup=true"
                        method="post">
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Bildquellen</b></th>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <textarea name="image_source" style="width: 340px; height: 225px;"></textarea><br>
                                    <small>z.B. Max Mustermann, http://www.fotolia.com</small>
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Verantwortliche(r) für journalistisch-redaktionelle
                                        Inhalte</b></th>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <textarea name="responsible_persons"
                                              style="width: 340px; height: 225px;"></textarea><br>
                                    <small>Vor-, Nachname inkl. Anschrift angeben. Bei mehreren Verantwortlichen die
                                        Verantwortungen entsprechend mit angeben.
                                    </small>
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row" colspan="2"><b>Behördliche Zuslassung</b></th>
                            </tr>
                            <tr valign="top">
                                <td colspan="2">
                                    <textarea name="responsible_chamber"
                                              style="width: 340px; height: 225px;"></textarea><br>
                                    <small>Zuständige Aufsichtsbehörde</small>
                                </td>
                            </tr>
                        </table>
                        <?= submit_button("Nächster Schritt") ?>
                    </form>
                    <?php

                    break;

                case 7:

                    $fields7 = array();

                    $fields7[] = $image_source = mysql_real_escape_string($_POST['image_source']);
                    $fields7[] = $responsible_persons = mysql_real_escape_string($_POST['responsible_persons']);
                    $fields7[] = $responsible_chamber = mysql_real_escape_string($_POST['responsible_chamber']);

                    print_r($fields7);

                    ?>
                    Ihr Impressum ist fertig konfiguriert.
                    <?php

                    break;
                default:
                    $this->wpi_config_view();
                    break;
            }
        } else {
            $this->wpi_config_view();
        }
    }

    private function wpi_config_view()
    {
        ?>
        <p>
            Richten Sie Ihr Impressum jetzt ein! Es kostet nur wenige Klicks!
        </p>
        <a href="options-general.php?page=<?= WPImpressumConfig::getInstance()->wpi_getSlug() ?>&step=1&setup=true">
            <input class="button button-primary" type="button" value="<?= _e('Impressum konfigurieren') ?>">
        </a>
    <?php
    }

}
