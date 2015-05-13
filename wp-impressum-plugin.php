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
        if(get_option("wp_impressum_notice") === false && get_option("wp_impressum_name_company") === false) {
            $class = "error";
            $message = sprintf(__("Dein Wordpress Impressum ist nicht eingerichtet! %s, um deine Webseite rechtssicher zu machen."), "<a href='options-general.php?page=" . WP_Impressum_Config::getInstance()->wpimpressum_getSlug() . "&step=1&&setup=true&dismiss=true'>Lege jetzt dein Impressum an</a>");
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

// Some Logic that does not to be included in the classes

// Fields for credentials which will be summed up in the impressum
function wp_impressum_field_credit( $form_fields, $post ) {
    $form_fields['wp-impressum-image-credential'] = array(
        'label' => __('Urheber vom Bild'),
        'input' => 'text',
        'value' => get_post_meta( $post->ID, 'wp_impressum_image_credential', true ),
        'helps' => __("Name von dem Urheber für den Nachweis im Impressum"),
    );

    return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'wp_impressum_field_credit', 10, 2 );

function wp_impressum_field_credit_save( $post, $attachment ) {
    if( isset( $attachment['wp-impressum-image-credential'] ) )
        update_post_meta( $post['ID'], 'wp_impressum_image_credential', $attachment['wp-impressum-image-credential'] );

    return $post;
}

add_filter( 'attachment_fields_to_save', 'wp_impressum_field_credit_save', 10, 2 );


