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
 * @since             0.1.0
 * @package           Wp_Impressum_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       WP Impressum Plugin
 * Plugin URI:        http://www.wp-impressum.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           0.1.0
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

require plugin_dir_path(__FILE__) . 'wp-impressum/wp-impressum-config.class.php';

$conf = WPImpressumConfig::getInstance();

// Load translations
$plugin_dir = basename(dirname(__FILE__));
load_plugin_textdomain($conf->wpimpressum_getSlug(), 'wp-content/plugins/' . $plugin_dir . '/languages', $plugin_dir . '/languages');

// shortcode for "wpimpressum", shortcode: wpimpressum
function wpimpressum_shortcode( $atts ) {
    $impressum_id = get_option("wp_impressum_choosen_post_id");
    if(empty($impressum_id)) {
        return '<a href="'.site_url().'">Impressum</a>';
    }
    $page_link = get_permalink( $impressum_id );
    return '<a href="'.$page_link.'">Impressum</span>';
}
add_shortcode( 'wpimpressum', 'wpimpressum_shortcode' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */
function run_wp_impressum_plugin()
{
    global $conf;
    $wpi = new WPImpressum();
    $wpi->wpimpressum_update_impressum();
}

add_action("admin_head", "run_wp_impressum_plugin");


