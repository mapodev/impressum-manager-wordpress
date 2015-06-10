<?php

defined('ABSPATH') or die('No script kiddies please!');

class ImpressumManager
{

    private static $_format_address;
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

    function __construct()
    {
        $domain = SLUG;

	    self::$_format_address = "";
	    self::$_format_contact = "";
	    self::$_format_contact_telephone = "";
	    self::$_format_contact_telefax = "";
	    self::$_format_contact_email = "";
	    self::$_format_register = "";
	    self::$_format_register_registered_in = "";
	    self::$_format_register_registernr = "";
	    self::$_format_register_chamber = "";
	    self::$_format_vat = "";
	    self::$_format_office = "";
	    self::$_format_image_soruce = "";
	    self::$_format_authorized_person = "";
	    self::$_format_journalistic_content = "";
	    self::$_disclaimer = "";
	    self::$_privacy_policy_head = "";
	    self::$_privacy_policy_general = "";
	    self::$_privacy_policy_facebook = "";
	    self::$_privacy_policy_analytics = "";
	    self::$_privacy_policy_adsense = "";
	    self::$_privacy_policy_plus = "";
	    self::$_privacy_policy_twitter = "";
	    self::$_privacy_policy_end = "";

        self::$_source = __("<p>Quelle: <em><a rel=\"nofollow\" href=\"http://www.e-recht24.de/impressum-generator.html\">http://www.e-recht24.de</a></em></p>", $domain);
        self::$_plugin_by = __("<p>Plugin von <a href=\"http://www.impressum-manager.com\">Impressum Manager</a></p>", $domain);
    }

    public function content()
    {
        $impressum = "";

        $lang = strtolower(get_option("impressum_manager_language_of_impressum"));

        // standard language, can be changed later on
        if (empty($lang)) $lang = "de";
        if (strpos($lang, "no_land_choosen") !== false) $lang = "de";

        $name = get_option("impressum_manager_name_company");
        $address = get_option("impressum_manager_address");
        $address_extra = get_option("impressum_manager_address_extra");
        $place = get_option("impressum_manager_place");
        $zip = get_option("impressum_manager_zip");

        if (!empty($name) || !empty($address) || !empty($address_extra) || !empty($place) || !empty($zip)) {
            $impressum = $this->address($lang, $name, $address, $address_extra, $place, $zip);
        }

        // params for contact
        $telefon = get_option("impressum_manager_phone");
        $fax = get_option("impressum_manager_fax");
        $email = get_option("impressum_manager_email");

        // params for vat
        $vat = get_option("impressum_manager_vat");

        // params for register
        $register = get_option("impressum_manager_register");
        $registernr = get_option("impressum_manager_registenr");
        $chamber = get_option("impressum_manager_chamber");

        // disclaimer
        $disclaimer = get_option("impressum_manager_disclaimer");

        // privacy policy stuff
        $policy_general = get_option("impressum_manager_general_privacy_policy");
        $policy_facebook = get_option("impressum_manager_policy_facebook");
        $policy_analytics = get_option("impressum_manager_policy_google_analytics");
        $policy_adsense = get_option("impressum_manager_policy_google_adsense");
        $policy_plus = get_option("impressum_manager_policy_google_plus");
        $policy_twitter = get_option("impressum_manager_policy_twitter");

        // authorized persons
        $authorized_person = get_option("impressum_manager_authorized_person");

        // journalistic responsible persons for content
        $responsible_person_for_content = get_option("impressum_manager_responsible_persons");

        // chamber, state and rules for given VAT
        $chamber = get_option("impressum_manager_chamber");
        $rules = get_option("impressum_manager_state_rules");
        $state = get_option("impressum_manager_state");
        $profession = get_option("impressum_manager_regulated_profession");

        $impressum .= $this->contact($telefon, $fax, $email);
        if (!empty($authorized_person)) {
            $impressum .= $this->authorized_person($authorized_person);
        }

        $impressum .= $this->register($chamber, $registernr, $register);
        $impressum .= $this->vat($vat, $profession, $state, $rules, $chamber);

        if (!empty($responsible_person_for_content)) {
            $impressum .= $this->journalistic($responsible_person_for_content);
        }

        $creds = array();
        $i = 0;

        $post_types = get_post_types('', 'names');

        foreach ($post_types as $post_type) {
            $args = array(
                'post_type' => $post_type,
                'numberposts' => -1,
                'post_status' => null
            );

            $posts = get_posts($args);

            foreach ($posts as $post) {
                $args = array(
                    'post_type' => 'attachment',
                    'numberposts' => -1,
                    'post_status' => null,
                    'post_parent' => $post->ID
                );

                $attachments = get_posts($args);
                if ($attachments) {
                    foreach ($attachments as $attachment) {
                        $creds[$i++] = trim(strip_tags(get_post_meta($attachment->ID, 'impressum_manager_image_credential', true)));
                    }
                }
            }
        }

        $image_source = get_option("impressum_manager_image_source");

        if (!empty($image_source) || !empty($creds)) {
            $impressum .= $this->credits($creds);
        }

        if ($disclaimer) $impressum .= self::$_disclaimer;

        if ($policy_general || $policy_facebook || $policy_analytics || $policy_adsense || $policy_plus || $policy_twitter) {
            $impressum .= $this->privacy_policy($policy_general, $policy_facebook, $policy_analytics, $policy_adsense, $policy_plus, $policy_twitter);
        }

        $extra_field = get_option("impressum_manager_extra_field");

        if (!empty($extra_field)) {
            $impressum .= $extra_field;
        }

        $impressum .= self::$_source;
        $impressum .= self::$_plugin_by;

        return $impressum;
    }

    private function address($name, $adress, $adress_extra, $place, $zip)
    {
        $result = self::$_format_address;
        if (!empty($name)) $result .= $name . "<br>";
        if (!empty($adress)) $result .= $adress . "<br>";
        if (!empty($adress_extra)) $result .= $adress_extra . "<br>";
        if (!empty($zip)) $result .= $zip . " ";
        if (!empty($place)) $result .= $place . "<br>";
        return $result;
    }

    private function contact($telefon, $fax, $email)
    {
        $result = self::$_format_contact;
        $result .= "<table><tbody>";
        if (!empty($telefon)) $result .= sprintf(self::$_format_contact_telephone, $telefon);
        if (!empty($fax)) $result .= sprintf(self::$_format_contact_telefax, $fax);

        if ($email && get_option("impressum_manager_show_email_as_image") == "on") {
            $image = "<img src='" . plugin_dir_url(__FILE__) . "../includes/email-as-image.php?text=" . $email . "'>";
        } else if($email) {
	        $image = $email;
        }

        if (!empty($email)) $result .= sprintf(self::$_format_contact_email, $image);
        $result .= "</tbody></table>";
        return $result;
    }

    private function register($register_chamber, $registernr, $register)
    {
        $domain = SLUG;

        switch ($register) {
            case 1:
                $register_registered_in = __("Kein Register", $domain);
                break;
            case 2:
                $register_registered_in = __("Genossenschaftsregister", $domain);
                break;
            case 3:
                $register_registered_in = __("Handelsregister", $domain);
                break;
            case 4:
                $register_registered_in = __("Partnerschaftsregister", $domain);
                break;
            case 5:
                $register_registered_in = __("Vereinsregister", $domain);
                break;
            default:
                $register_registered_in = __("Kein Register", $domain);
                break;
        }

        if ((empty($register) || $register == 1) && empty($registernr) && empty($register_chamber)) return "";

        $result = self::$_format_register;
        $result .= "<p>";

        if (!empty($register) && $register != 1) $result .= sprintf(self::$_format_register_registered_in, $register_registered_in);
        if (!empty($registernr)) $result .= sprintf(self::$_format_register_registernr, $registernr);
        if (!empty($register_chamber)) $result .= sprintf(self::$_format_register_chamber, $register_chamber);
        $result .= "</p>";
        return $result;
    }

    private function credits($creds)
    {
        $result = self::$_format_image_soruce;
        $creds = array_unique($creds);
        foreach ($creds as $credit) {
            $result .= $credit . "<br>";
        }
        if (get_option("impressum_manager_image_source") !== false) {
            $result .= nl2br(get_option("impressum_manager_image_source"));
        }
        return $result;
    }

    private function authorized_person($person)
    {
        $result = self::$_format_authorized_person;
        if (!empty($person)) {
            $result .= nl2br($person);
        }
        return $result;
    }

    private function vat($vat, $profession, $state, $rules, $chamber)
    {
        $domain = SLUG;

        $result = "";
        if (!empty($vat)) $result .= sprintf(self::$_format_vat, $vat);
        if(strlen(get_option("impressum_manager_regulated_profession_checked")) > 0) {
            if (!empty($profession)) $result .= __("Berufsbezeichnung:", $domain) . " " . $profession . "<br>";
            if (!empty($chamber)) $result .= __("Zuständige Kammer:", $domain) . " " . $chamber . "<br>";
            if (!empty($state)) $result .= __("Verliehen durch:", $domain) . " " . $state . "<br>";
            if (!empty($rules)) $result .= __("Es gelten folgende berufsrechtliche Regelungen:", $domain) . " " . $rules . "<br>";
        }
        return $result;
    }

    private function journalistic($p)
    {
        $result = self::$_format_journalistic_content;
        if (!empty($p)) {
            $result .= nl2br($p);
        }
        return $result;
    }

    private function privacy_policy($general, $facebook, $analytics, $adsense, $plus, $twitter)
    {
        $result = self::$_privacy_policy_head;
        if (strlen($general) > 0) $result .= self::$_privacy_policy_general;
        if (strlen($facebook) > 0) $result .= self::$_privacy_policy_facebook;
        if (strlen($analytics) > 0) $result .= self::$_privacy_policy_analytics;
        if (strlen($adsense) > 0) $result .= self::$_privacy_policy_adsense;
        if (strlen($plus) > 0) $result .= self::$_privacy_policy_plus;
        if (strlen($twitter) > 0) $result .= self::$_privacy_policy_twitter;
        $result .= self::$_privacy_policy_end;
        return $result;
    }
}
