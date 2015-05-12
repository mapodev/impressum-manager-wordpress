<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.mapo-dev.com
 * @since             1.0.0
 * @package           Wp_Impressum_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       WP Impressum Plugin
 * Plugin URI:        http://www.wp-impressum.com
 * Description:       WP Impressum Generator for your wordpress copy. Manages all points for creating an impressum.
 * Version:           0.2.1
 * Author:            mapo
 * Author URI:        http://www.mapo-dev.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-impressum-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

add_action('admin_notices', 'wpimpressum_installation_notice');

function wpimpressum_installation_notice()
{
    $request = $_SERVER['REQUEST_URI'];
    if(strpos($request, WP_Impressum_Config::getInstance()->wpimpressum_getSlug()) !== false) {
        // indside impressum
    } else {
        if(get_option("wp_impressum_notice") === false) {
            $class = "error";
            $message = sprintf(__("Dein Wordpress Impressum ist nicht eingerichtet! %s, um deine Webseite rechtssicher zu machen."), "<a href='options-general.php?page=" . WP_Impressum_Config::getInstance()->wpimpressum_getSlug() . "&setup=true&dismiss=true'>Lege jetzt dein Impressum an</a>");
            echo "<div class=\"$class\"> <p>$message</p></div>";
        }
    }
}


require_once(plugin_dir_path(__FILE__) . 'wp-impressum/wp-impressum.class.php');

function activate_wp_impressum_plugin()
{
    require_once plugin_dir_path(__FILE__) . 'includes/wp-impressum-activate.php';
    activate();
}

function deactivate_wp_impressum_plugin()
{
    require_once plugin_dir_path(__FILE__) . 'includes/wp-impressum-deactivate.php';
    deactivate();
}

register_activation_hook(__FILE__, 'activate_wp_impressum_plugin');
register_deactivation_hook(__FILE__, 'deactivate_wp_impressum_plugin');


function wpimpressum_load_translations()
{
    require plugin_dir_path(__FILE__) . 'wp-impressum/wp-impressum-config.class.php';
    $conf = WP_Impressum_Config::getInstance();
    // Load translations
    $plugin_dir = basename(dirname(__FILE__));
    load_plugin_textdomain($conf->wpimpressum_getSlug(), 'wp-content/plugins/' . $plugin_dir . '/languages', $plugin_dir . '/languages');
}
add_action('init', "wpimpressum_load_translations");

function wpimpressum_content_shortcode($atts)
{
    $wpi = new WPImpressum();
    return $wpi->wpimpressum_content();
}

add_shortcode('wp_impressum', 'wpimpressum_content_shortcode');

function wpimpressum_goodybye()
{
    ?>
    Goodbye!
<?
}

register_uninstall_hook(plugin_dir_path(__FILE__) . "uninstall.php", "wpimpressum_goodybye");


