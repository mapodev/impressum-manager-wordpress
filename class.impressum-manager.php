<?php


class Impressum_Manager
{

    private static $initiated = false;

    public static function init()
    {
        if (!self::$initiated) {
            self::init_hooks();
            self::load_translations();
        }
    }

    private static function init_hooks()
    {
        self::$initiated = true;

        add_action('the_posts', array('Impressum_Manager', 'metashortcode'));
        add_shortcode("impressum_manager_setting", array('Impressum_Manager', 'var_shortcode'));
    }

    public static function plugin_activation()
    {
        require_once plugin_dir_path(__FILE__) . 'includes/impressum-manager-activate.php';
        impressum_manager_install_activate();
    }

    public static function plugin_deactivation()
    {
        require_once plugin_dir_path(__FILE__) . 'includes/impressum-manager-deactivate.php';
        impressum_manager_deactivate();
    }

    public static function load_translations()
    {
        /*require plugin_dir_path(__FILE__) . 'admin/class.plugin-config.php';*/
        $plugin_dir = basename(dirname(__FILE__));
        load_plugin_textdomain(SLUG, 'wp-content/plugins/' . $plugin_dir . '/languages', $plugin_dir . '/languages');
    }

    // SHORTCODE CODE

	public static function content_shortcode($atts)
	{
        if(!empty($atts)) {
            $result = "";
            switch (strtolower($atts["var"])) {
                case "company name":
                    $result = get_option("impressum_manager_name_company");
                    break;
                case "address":
                    $result = get_option("impressum_manager_address");
                    break;
                case "address axtra":
                    $result = get_option("impressum_manager_address_extra");
                    break;
                case "place":
                    $result = get_option("impressum_manager_place");
                    break;
                case "zip":
                    $result = get_option("impressum_manager_zip");
                    break;
                case "county":
                    $result = get_option("impressum_manager_country");
                    break;
                case "fax":
                    $result = get_option("impressum_manager_fax");
                    break;
                case "email":
                    $result = get_option("impressum_manager_email");
                    break;
                case "phone":
                    $result = get_option("impressum_manager_phone");
                    break;
                case "authorized person":
                    $result = get_option("impressum_manager_authorized_person");
                    break;
                case "vat":
                    $result = get_option("impressum_manager_vat");
                    break;
                case "register number":
                    $result = get_option("impressum_manager_registenr");
                    break;
                case "regulated profession":
                    $result = get_option("impressum_manager_regulated_profession");
                    break;
                case "state":
                    $result = get_option("impressum_manager_state");
                    break;
                case "state rules":
                    $result = get_option("impressum_manager_state_rules");
                    break;
                case "responsible persons":
                    $result = get_option("impressum_manager_responsible_persons");
                    break;
                case "responsible chamber":
                    $result = get_option("impressum_manager_responsible_chamber");
                    break;
                case "image source":
                    $result = get_option("impressum_manager_image_source");
                    break;
                case "register": {
                    $nr = get_option("impressum_manager_register");
                    switch ($nr) {
                        case 1:
                            $result = __("Kein Register");
                            break;
                        case 2:
                            $result = __("Genossenschaftsregister");
                            break;
                        case 3:
                            $result = __("Handelsregister");
                            break;
                        case 4:
                            $result = __("Partnerschaftsregister");
                            break;
                        case 5:
                            $result = __("Vereinsregister");
                            break;
                    }
                };
                    break;
                case "form": {
                    $form = get_option("impressum_manager_form_of_organization");
                    switch ($form) {
                        case 1:
                            $result = __("Einzelunternehmen");
                            break;
                        case 2:
                            $result = __("Stille Gesellschaft");
                            break;
                        case 3:
                            $result = __("Offene Handelsgesellschaft (OHG)");
                            break;
                        case 4:
                            $result = __("Kommanditgesellschaft (KG)");
                            break;
                        case 5:
                            $result = __("Gesellschaft bürgerlichen Rechts (GdR)");
                            break;
                        case 6:
                            $result = __("Aktiengesellschaft (AG)");
                            break;
                        case 7:
                            $result = __("Kommanditgesellschaft auf Aktien (KGaA)");
                            break;
                        case 8:
                            $result = __("Gesellschaft mit beschränkter Haftung (GmbH)");
                            break;
                        case 9:
                            $result = __("Genossenschaft (eG)");
                            break;
                    }
                };
                    break;
            }

            if(empty($result)) $result = "";

            return $result;
        }

		return Impressum_Manager_Generator::get_impressum();
	}

    // Function to hook to "the_posts" (just edit the two variables)
    public static function metashortcode($posts)
    {
        $shortcode = 'impressum_manager';
        $callback_function = self::metashortcode_setmeta();

        return self::metashortcode_shortcode_to_wphead($posts, $shortcode, $callback_function);
    }

    // To execute when shortcode is found
    public static function metashortcode_setmeta()
    {
        echo '<meta name="robots" content="noindex,nofollow">';
    }


    // look for shortcode in the content and apply expected behaviour (don't edit!)
    public static function metashortcode_shortcode_to_wphead($posts, $shortcode, $callback_function)
    {
        if (empty($posts)) {
            return $posts;
        }

        $show_noindex = get_option("impressum_manager_noindex");
        $execute_wp_head = false;

        if ($show_noindex !== false && strlen($show_noindex) > 0) {
            $execute_wp_head = true;
        }

        $found = false;
        foreach ($posts as $post) {
            if (stripos($post->post_content, '[' . $shortcode) !== false) {
                // remove standard no index
                if ($execute_wp_head) {
                    remove_action('wp_head', 'noindex', 1);
                }
                // remove others plugin noindex
                if ($execute_wp_head) {
                    // Yoast Seo
                    if (class_exists('WPSEO_Frontend')) {
                        $wpseo = WPSEO_Frontend::get_instance();
                        remove_action('wpseo_head', array($wpseo, 'robots'));
                    }

                    // WP SEO by sergej müller
                    if (class_exists('wpSEO_Output')) {
                        remove_action('wpseo_the_robots', array('wpSEO_Output', 'the_robots'));
                    }

                    // Wordpress Meta Robots
                    if (class_exists('wp_meta_robots_plugin')) {
                        remove_action('wp_head', array('wp_meta_robots_plugin', 'add_meta_robots_tag'));
                    }
                }
                add_shortcode($shortcode, array('Impressum_Manager', 'content_shortcode'));
                $found = true;
                break;
            }
        }

        if ($found && $execute_wp_head) {
            add_action('wp_head', $callback_function);
        }

        return $posts;
    }

}


?>
