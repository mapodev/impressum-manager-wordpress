<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       http://www.mapo-dev.com
 * @since      0.1.0
 *
 * @package    Wp_Impressum_Plugin
 */

// If uninstall not called from WordPress, then exit.
//if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
//    exit;
//}

delete_option("wp_impressum_person");
delete_option("wp_impressum_form_of_organization");
delete_option("wp_impressum_name_company");
delete_option("wp_impressum_address");
delete_option("wp_impressum_address_extra");
delete_option("wp_impressum_place");
delete_option("wp_impressum_zip");
delete_option("wp_impressum_country");
delete_option("wp_impressum_fax");
delete_option("wp_impressum_email");
delete_option("wp_impressum_phone");
delete_option("wp_impressum_authorized_person");
delete_option("wp_impressum_vat");
delete_option("wp_impressum_register");
delete_option("wp_impressum_registenr");
delete_option("wp_impressum_regulated_profession");
delete_option("wp_impressum_state");
delete_option("wp_impressum_state_rules");
delete_option("wp_impressum_chamber");
delete_option("wp_impressum_image_source");
delete_option("wp_impressum_responsible_chamber");
delete_option("wp_impressum_responsible_persons");
delete_option("wp_impressum_disclaimer");
delete_option("wp_impressum_set_impressum");
delete_option("wp_impressum_language_of_impressum");
delete_option("wp_impressum_general_privacy_policy");
delete_option("wp_impressum_policy_facebook");
delete_option("wp_impressum_policy_google_analytics");
delete_option("wp_impressum_regulated_profession_checked");
delete_option("wp_impressum_allowness");
delete_option("wp_impressum_press_content");
delete_option("wp_impressum_disabled");
delete_option("wp_impressum_notice");
delete_option("wp_impressum_extra_field");
delete_option("wp_impressum_page");
delete_option("wp_impressum_id");
delete_option("wp_impressum_policy_google_plus");
delete_option("wp_impressum_policy_twitter");
delete_option("wpimpresusm_onboarding_conf");

unregister_setting("wp-impressum-policy_group", "wp_impressum_disclaimer");
unregister_setting("wp-impressum-policy_group", "wp_impressum_set_impressum");
unregister_setting("wp-impressum-policy_group", "wp_impressum_language_of_impressum");
unregister_setting("wp-impressum-policy_group", "wp_impressum_general_privacy_policy");
unregister_setting("wp-impressum-policy_group", "wp_impressum_policy_facebook");
unregister_setting("wp-impressum-policy_group", "wp_impressum_policy_google_analytics");
unregister_setting("wp-impressum-policy_group", "wp_impressum_policy_google_adsense");
unregister_setting("wp-impressum-policy_group", "wp_impressum_policy_twitter");
unregister_setting("wp-impressum-policy_group", "wp_impressum_policy_google_plus");

// no databases used, finishing
