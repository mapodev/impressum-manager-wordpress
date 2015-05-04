<?php

defined('ABSPATH') or die('No script kiddies please!');

class WPImpressum
{

    private static $_de_format_address = "<h2>Angaben gemäß § 5 TMG:</h2><p>%s<br />%s<br />%s<br />%s %s</p>";
    private static $_de_format_representant = "<h2>Vertreten durch:</h2><p>[Vertreten durch: %s, %s]</p>";
    private static $_de_format_contact = "<h2>Kontakt:</h2>";
    private static $_de_format_contact_telephone = "<tr><td>Telefon:</td><td>%s</td></tr>";
    private static $_de_format_contact_telefax = "<tr><td>Telefax:</td><td>%s</td></tr>";
    private static $_de_format_contact_email = "<tr><td>E-Mail:</td><td>%s</td></tr>";
    private static $_de_format_register = "<h2>Registereintrag:</h2>";
    private static $_de_format_register_registered_in = "Eintragung im %s.";
    private static $_de_format_register_registernr = "<br>Registernummer: %s";
    private static $_de_format_register_chamber = "<br>Registergericht: %s";
    private static $_de_format_vat = "<h2>Umsatzsteuer-ID:</h2><p>Umsatzsteuer-Identifikationsnummer gemäß §27 a Umsatzsteuergesetz:<br>%s</p>";
    private static $_de_format_office = "<h2>Aufsichtsbehörde:</h2><p>Aufsichtsbehörde</p><p>Berufsbezeichnung: gesetzl. Berufsbezeichnung:<br>Zuständige Kammer: %s<br>Verliehen durch: %s<br>Es gelten folgende berufsrechtliche Regelungen: %s<br></p>";

    private static $_de_source = '<p>Quelle: <em><a rel="nofollow" href="http://www.e-recht24.de/impressum-generator.html">http://www.e-recht24.de</a></em></p>';
    private static $_de_plugin_by = '<p>Plugin von <a href="http://www.wp-impressum.com">WP-Impressum</a></p>';

    function __construct()
    {
        $page = get_page_by_title("Impressum");
        if (empty($page)) {
            $page_id = wp_insert_post(
                array(
                    'comment_status' => 'closed',
                    'ping_status' => 'closed',
                    'post_author' => 1,
                    'post_name' => WPImpressumConfig::getInstance()->wpimpressum_getSlug(),
                    'post_title' => "Impressum",
                    'post_status' => 'publish',
                    'post_type' => 'page',
                    'post_content' => ''
                )
            );
        }
    }

    public function wpimpressum_update_impressum()
    {
        $impressum = "";

        $lang = strtolower(get_option("wp_impressum_language_of_impressum"));

        // standard language, can be changed later on
        if(empty($lang)) $lang = "de";

        $name = get_option("wp_impressum_name_company");
        $address = get_option("wp_impressum_address");
        $address_extra = get_option("wp_impressum_address_extra");
        $place = get_option("wp_impressum_place");
        $zip = get_option("wp_impressum_zip");

        if(!empty($name) && !empty($address) && !empty($address_extra) && !empty($place) && !empty($zip)) {
            $impressum = $this->wpimpressum_return_address($lang, $name, $address, $address_extra, $place, $zip);
        }

        // params for contact
        $telefon = get_option("wp_impressum_phone");
        $fax = get_option("wp_impressum_fax");
        $email = get_option("wp_impressum_email");

        // params for vat
        $vat = get_option("wp_impressum_vat");

        // params for register
        $register = get_option("wp_impressum_register");
        $registernr = get_option("wp_impressum_registenr");
        $chamber = get_option("wp_impressum_chamber");

        $impressum .= $this->wpimpressum_return_contact($lang, $telefon, $fax, $email);
        $impressum .= $this->wpimpressum_return_vat($lang, $vat);
        $impressum .= $this->wpimpressum_return_register($lang, $chamber, $registernr, $register);

        $impressum .= self::$_de_source;
        $impressum .= self::$_de_plugin_by;

        $page = get_page_by_title("Impressum");
        $id = $page->ID;
        if ($id) {
            $impressum_post = array(
                'ID' => $id,
                'post_content' => $impressum
            );

            wp_update_post($impressum_post);
        }
    }

    private function wpimpressum_return_address($lang, $name, $adress, $adress_extra, $place, $zip) {
        return sprintf(self::${'_'.$lang.'_format_address'}, $name, $adress, $adress_extra, $place, $zip);
    }

    private function wpimpressum_return_representant($lang, $name, $address) {
        return sprintf(self::${'_'.$lang.'_format_representant'}, $name, $address);
    }

    private function wpimpressum_return_contact($lang, $telefon, $fax, $email) {
        $r = self::${'_'.$lang.'_format_contact'};
        $r .= "<table><tbody>";
        if(!empty($telefon)) $r .= sprintf(self::${'_'.$lang.'_format_contact_telephone'}, $telefon);
        if(!empty($fax)) $r .= sprintf(self::${'_'.$lang.'_format_contact_telefax'}, $fax);
        if(!empty($email)) $r .= sprintf(self::${'_'.$lang.'_format_contact_email'}, $email);
        $r .= "</tbody></table>";
        return $r;
    }

    private function wpimpressum_return_register($lang, $register_chamber, $registernr, $register) {
        $r = self::${'_'.$lang.'_format_register'};
        $r .= "<p>";
        if(!empty($register)) $r .= sprintf(self::${'_'.$lang.'_format_register_registered_in'}, $register);
        if(!empty($registernr)) $r .= sprintf(self::${'_'.$lang.'_format_register_registernr'}, $registernr);
        if(!empty($register_chamber)) $r .= sprintf(self::${'_'.$lang.'_format_register_chamber'}, $register_chamber);
        $r .= "</p>";
        return $r;
    }

    private function wpimpressum_return_vat($lang, $vat) {
        if(!empty($vat)) return sprintf(self::${'_'.$lang.'_format_vat'}, $vat);
        return "";
    }
}
