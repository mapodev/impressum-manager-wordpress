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
 * Version:           0.4.1
 * Author:            mapo
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

add_action('admin_notices', 'impressum_manager_installation_notice');

function impressum_manager_installation_notice()
{
    $request = $_SERVER['REQUEST_URI'];
    if (strpos($request, impressum_manager_Config::get_instance()->get_slug()) !== false) {
        // indside impressum
    } else {
        if (get_option("impressum_manager_notice") === false && get_option("impressum_manager_name_company") === false) {
            $class = "error";
            $message = sprintf(__("Dein Wordpress Impressum ist nicht eingerichtet! %s, um deine Webseite rechtssicher zu machen."), "<a href='options-general.php?page=" . impressum_manager_Config::get_instance()->get_slug() . "&step=1&&setup=true&dismiss=true'>Lege jetzt dein Impressum an</a>");
            echo "<div class=\"$class\"> <p>$message</p></div>";
        }
    }
}


require_once(plugin_dir_path(__FILE__) . 'classes/impressum.class.php');

function impressum_manager_activate_plugin()
{
    require_once plugin_dir_path(__FILE__) . 'includes/classes-manager-activate.php';
    activate();
}

function impressum_manager_deactivate_plugin()
{
    require_once plugin_dir_path(__FILE__) . 'includes/classes-manager-deactivate.php';
    deactivate();
}

register_activation_hook(__FILE__, 'activate_impressum_manager_plugin');
register_deactivation_hook(__FILE__, 'deactivate_impressum_manager_plugin');


function impressum_manager_load_translations()
{
    require plugin_dir_path(__FILE__) . 'admin/plugin-config.class.php';
    $conf = impressum_manager_Config::get_instance();
    // Load translations
    $plugin_dir = basename(dirname(__FILE__));
    load_plugin_textdomain($conf->get_slug(), 'wp-content/plugins/' . $plugin_dir . '/languages', $plugin_dir . '/languages');
}

add_action('init', "impressum_manager_load_translations");

function impressum_manager_content_shortcode($atts)
{
    $im = new ImpressumManager();
    return $im->content();
}

function impressum_manager_goodybye()
{
    ?>
    Goodbye!
<?php
}

register_uninstall_hook(plugin_dir_path(__FILE__) . "uninstall.php", "impressum_manager_goodybye");

// Some Logic that does not to be included in the classes

// Fields for credentials which will be summed up in the impressum
function impressum_manager_field_credit($form_fields, $post)
{
    $form_fields['plugin-image-credential'] = array(
        'label' => __('Urheber vom Bild'),
        'input' => 'text',
        'value' => get_post_meta($post->ID, 'impressum_manager_image_credential', true)
    );

    return $form_fields;
}

add_filter('attachment_fields_to_edit', 'impressum_manager_field_credit', 10, 2);

function impressum_manager_field_credit_save($post, $attachment)
{
    if (isset($attachment['plugin-image-credential']))
        update_post_meta($post['ID'], 'impressum_manager_image_credential', $attachment['plugin-image-credential']);

    return $post;
}

add_filter('attachment_fields_to_save', 'impressum_manager_field_credit_save', 10, 2);

// Function to hook to "the_posts" (just edit the two variables)
function impressum_manager_metashortcode($posts)
{
    $shortcode = 'impressum_manager';
    $callback_function = 'impressum_manager_metashortcode_setmeta';

    return impressum_manager_metashortcode_shortcode_to_wphead($posts, $shortcode, $callback_function);
}

// To execute when shortcode is found
function impressum_manager_metashortcode_setmeta()
{
    echo '<meta name="robots" content="noindex,nofollow">';
}

// look for shortcode in the content and apply expected behaviour (don't edit!)
function impressum_manager_metashortcode_shortcode_to_wphead($posts, $shortcode, $callback_function)
{
    if (empty($posts))
        return $posts;

    $show_noindex = get_option("impressum_manager_noindex");
    $execute_wp_head = false;

    if ($show_noindex !== false && strlen($show_noindex) > 0) {
        $execute_wp_head = true;
    }

    $found = false;
    foreach ($posts as $post) {
        if (stripos($post->post_content, '[' . $shortcode) !== false) {
	        // remove standard no index
            if($execute_wp_head) remove_action('wp_head', 'noindex', 1);
	        // remove others plugin noindex
	        if($execute_wp_head) {
		        // Yoast Seo
		        if(class_exists('WPSEO_Frontend')) {
			        $wpseo = WPSEO_Frontend::get_instance();
			        remove_action('wpseo_head', array($wpseo, 'robots'));
		        }

		        // WP SEO by sergej müller
		        if(class_exists('wpSEO_Output')) {
			        remove_action( 'wpseo_the_robots', array( 'wpSEO_Output', 'the_robots' ) );
		        }

		        // Wordpress Meta Robots
		        if(class_exists('wp_meta_robots_plugin')) {
			        remove_action('wp_head', array('wp_meta_robots_plugin','add_meta_robots_tag'));
		        }
	        }
            add_shortcode($shortcode, 'impressum_manager_content_shortcode');
            $found = true;
            break;
        }
    }

    if ($found && $execute_wp_head)
        add_action('wp_head', $callback_function);

    return $posts;
}

// Instead of creating a shortcode, hook to the_posts
add_action('the_posts', 'impressum_manager_metashortcode');

?>