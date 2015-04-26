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
 * @since             0.0.1
 * @package           Wp_Impressum_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       WP Impressum Plugin
 * Plugin URI:        http://www.wp-impressum.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           0.0.1
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


// Load translations
$plugin_dir = basename(dirname(__FILE__));
load_plugin_textdomain(WPImpressumConfig::getInstance()->getSlug(), 'wp-content/plugins/' . $plugin_dir . '/languages', $plugin_dir . '/languages');

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.0.1
 */
function run_wp_impressum_plugin()
{
    try {
        $conf = WPImpressumConfig::getInstance();
    } catch (Exception $e) {
        error_log($e);
    }
}

run_wp_impressum_plugin();
