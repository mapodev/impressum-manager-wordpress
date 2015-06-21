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
 * @package           impressum_manager
 *
 * @wordpress-plugin
 * Plugin Name:       Impressum Manager
 * Plugin URI:        http://www.plugin.com
 * Description:       Impressum Generator for your wordpress copy. Manages all points for creating an Impressum.
 * Version:           0.5.0
 * Author:            Marcin Poholski, Christian Jäger
 * Author URI:        http://www.mapo-dev.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       impressum-manager
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
define('IMPRESSUM_MANAGER_VERSION', '0.5.0');
define('IMPRESSUM_MANAGER_PLUGIN_URL', plugin_dir_url(__FILE__));
define('IMPRESSUM_MANAGER_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SLUG', 'impressum-manager');
define('PLUGIN_NAME', 'Impressum-Manager');

register_activation_hook(__FILE__, array('Impressum_Manager', 'plugin_activation'));
register_deactivation_hook(__FILE__, array('Impressum_Manager', 'plugin_deactivation'));
register_uninstall_hook(plugin_dir_path(__FILE__) . "uninstall.php", "impressum_manager_goodybye");

require_once(IMPRESSUM_MANAGER_PLUGIN_DIR . 'class.impressum-manager.php');
require_once(IMPRESSUM_MANAGER_PLUGIN_DIR . 'includes/views/class.impressum-manager-form-factory.php');
require_once(IMPRESSUM_MANAGER_PLUGIN_DIR . 'includes/class.impressum-manager-impressum.php');
require_once(IMPRESSUM_MANAGER_PLUGIN_DIR . 'includes/class.impressum-manager-factory.php');

add_action('init', array('Impressum_Manager', 'init'));

require_once(IMPRESSUM_MANAGER_PLUGIN_DIR . 'class.impressum-manager-admin.php');
add_action('init', array('Impressum_Manager_Admin', 'init'));

add_action('plugins_loaded', array('Impressum_Manager', 'load_translations'));

function impressum_manager_goodybye()
{
    ?>
    Goodbye!
<?php
}

?>
