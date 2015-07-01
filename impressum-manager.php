<?php

/**
 * @link              http://www.impressum-manager.com
 * @since             1.0.0
 * @package           impressum_manager
 *
 * @wordpress-plugin
 * Plugin Name:       Impressum Manager
 * Plugin URI:        http://www.impressum-manager.com
 * Description:       Impressum Generator for your wordpress copy. Manages all points for creating an Impressum.
 * Version:           1.0.0
 * Author:            Marcin Poholski, Christian Jäger
 * Author URI:        http://www.impressum-manager.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       impressum-manager
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
define( 'IMPRESSUM_MANAGER_VERSION', '1.0.0' );
define( 'SLUG', 'impressum-manager' );


register_activation_hook( __FILE__, array( 'impressum_manager', 'plugin_activation' ) );
/**
 * Plugin activation hook
 *
 * @since 1.0.0
 */
function impressum_manager_activate() {
	require_once plugin_dir_path( __FILE__ ) . '/includes/impressum-manager-activate.php';
	impressum_manager_install_activate();
}

register_deactivation_hook( __FILE__, array( 'impressum_manager', 'plugin_deactivation' ) );
/**
 * Plugin deactiviation
 *
 * @since 1.0.0
 */
function impressum_manager_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . '/includes/impressum-manager-deactivate.php';
	impressum_manager_deactivate();
}

register_uninstall_hook( plugin_dir_path( __FILE__ ) . "uninstall.php", "impressum_manager_goodybye" );
// Uninstall Callback
function impressum_manager_goodybye() {
	?>
	Goodbye!
<?php
}


require_once( plugin_dir_path( __FILE__ ) . 'includes/class.impressum-manager.php' );

// runs plugin the
function impressum_manager_run() {
	$plugin = new Impressum_Manager();
	$plugin->run();
}

// run plugin
impressum_manager_run();

?>
