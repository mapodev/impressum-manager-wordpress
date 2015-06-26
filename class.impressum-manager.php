<?php

class Impressum_Manager
{

    private static $initiated = false;

    /**
     * Initialization of this class
     *
     * @since 1.0.0
     */
    public static function init()
    {
        if (!self::$initiated) {
            self::init_hooks();
        }
    }

    /**
     * Initialization of the hooks
     *
     * @since 1.0.0
     */
    private static function init_hooks()
    {
        self::$initiated = true;

        add_action('the_posts', array('Impressum_Manager', 'metashortcode'));
        add_shortcode("impressum_manager_setting", array('Impressum_Manager', 'var_shortcode'));
    }

    /**
     * Plugin activation hook
     *
     * @since 1.0.0
     */
    public static function plugin_activation()
    {
        require_once plugin_dir_path(__FILE__) . 'includes/impressum-manager-activate.php';
        impressum_manager_install_activate();
    }

    /**
     * Plugin deactiviation
     *
     * @since 1.0.0
     */
    public static function plugin_deactivation()
    {
        require_once plugin_dir_path(__FILE__) . 'includes/impressum-manager-deactivate.php';
        impressum_manager_deactivate();
    }

    /**
     * Load the translation files.
     *
     * @since 1.0.0
     */
    public static function load_translations()
    {
        load_plugin_textdomain(SLUG, false, dirname( plugin_basename( __FILE__ ) ) . '/languages');
    }

    /**
     * The actual shortcode method. Will return the impressum
     * contents of a part of the impressum. [impressum_manager]
     * will return the full impressum. [impresusm_manager type=xxx]
     * will return the part xxx of the impressum.
     * [impressum_manager var=xxx] will load a specific variable.
     *
     * @since 1.0.0
     *
     * @param $atts
     * @return mixed|string
     */
    public static function content_shortcode($atts)
    {
	    $impressum = Impressum_Manager_Manager::getInstance()->get_impressum();

        if (!empty($atts)) {

            $vals = strtolower($atts["type"]);
            $result = "";



            if (isset($atts['type'])) {
                if ($vals == "datenschutz" || $vals == "privacy policy") {
                    $result = $impressum->get_privacy_policy();
                } else if ($vals == "haftungsausschluss" || $vals == "disclaimer") {
                    $result = $impressum->get_disclaimer();
                } else if ($vals == "kontakt" || $vals == "contact") {
                    $result = $impressum->get_contact();
                } else if ($vals == "bildquellen" || $vals == "image sources") {
                    $result = $impressum->get_image_sources();
                }
            } else {

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
            }
            if (empty($result)) {
                $result = "";
            }

            return $result;
        }

        return $impressum->get_content();
    }

    /**
     * Function to hook to "the_posts". A nice trick to workaround the
     * shortcode problem.
     *
     * @since 1.0.0
     *
     * @param $posts
     * @return mixed
     */
    public static function metashortcode($posts)
    {
        $shortcode = 'impressum_manager';
        $callback_function = self::metashortcode_setmeta();

        return self::metashortcode_shortcode_to_wphead($posts, $shortcode, $callback_function);
    }

    /**
     * To execute when shortcode is found. Will add
     * noindex paramter to the page of that impressum
     * specific page.
     *
     * @since 1.0.0
     */
    public static function metashortcode_setmeta()
    {
        echo '<meta name="robots" content="noindex,nofollow">';
    }

    /**
     * Add meta stuff to the wp head before executing shortcode.
     * Good workaround for the request query.
     *
     * @param $posts
     * @param $shortcode
     * @param $callback_function
     * @return mixed
     */
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
