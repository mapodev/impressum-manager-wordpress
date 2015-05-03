<?php

defined('ABSPATH') or die('No script kiddies please!');

class WPImpressum
{

    private static $_de_format_address = "<h2>Angaben gemäß § 5 TMG:</h2><p>%s<br />%s<br />%s<br />%s %s</p>";
    private static $_de_format_representant = "<h2>Vertreten durch:</h2><p>[Vertreten durch: %s, %s]</p>";
    private static $_de_format_contact = "<h2>Kontakt:</h2><table><tbody><tr><td>Telefon:</td><td>%s</td></tr><tr><td>Telefax:</td><td>%s</td></tr><tr><td>E-Mail:</td><td>%s</td></tr></tbody></table>";
    private static $_de_format_register = "<h2>Registereintrag:</h2><p>Eintragung im %s. <br>Registergericht:%s<br>Registernummer: %s</p>";
    private static $_de_format_vat = "<h2>Umsatzsteuer-ID:</h2><p>Umsatzsteuer-Identifikationsnummer gemäß §27 a Umsatzsteuergesetz:<br>%s</p>";
    private static $_de_format_office = "<h2>Aufsichtsbehörde:</h2><p>Aufsichtsbehörde</p><p>Berufsbezeichnung: gesetzl. Berufsbezeichnung:<br>Zuständige Kammer: %s<br>Verliehen durch: %s<br>Es gelten folgende berufsrechtliche Regelungen: %s<br></p>";

    private static $_de_source = '<p>Quelle: <em><a rel="nofollow" href="http://www.e-recht24.de/impressum-generator.html">http://www.e-recht24.de</a></em></p>';

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

        $name = get_option("wp_impressum_name_company");
        $address = get_option("wp_impressum_address");
        $address_extra = get_option("wp_impressum_address_extra");
        $place = get_option("wp_impressum_place");
        $zip = get_option("wp_impressum_zip");

        if(!empty($name) && !empty($address) && !empty($address_extra) && !empty($place) && !empty($zip)) {
            $impressum = $this->wpimpressum_return_adress("de", $name, $address, $address_extra, $place, $zip);
        }

        $telefon = get_option("wp_impressum_phone");
        $fax = get_option("wp_impressum_fax");
        $email = get_option("wp_impressum_email");

        if(!empty($telefon)) {
            $impressum .= $this->wpimpressum_return_contact("de", $telefon, $fax, $email);
        }

        $impressum .= self::$_de_source;

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

    private function wpimpressum_return_adress($lang, $name, $adress, $adress_extra, $place, $zip) {
        return sprintf(self::${'_'.$lang.'_format_address'}, $name, $adress, $adress_extra, $place, $zip);
    }

    private function wpimpressum_return_representant($lang, $name, $address) {
        return sprintf(self::${'_'.$lang.'_format_representant'}, $name, $address);
    }

    private function wpimpressum_return_contact($lang, $telefon, $fax, $email) {
        return sprintf(self::${'_'.$lang.'_format_contact'}, $telefon, $fax, $email);
    }
}
