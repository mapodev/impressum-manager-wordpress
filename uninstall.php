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
 * @package    impressum_manager_Plugin
 */

// If uninstall not called from WordPress, then exit.
//if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
//    exit;
//}

delete_option("impressum_manager_person");
delete_option("impressum_manager_form_of_organization");
delete_option("impressum_manager_name_company");
delete_option("impressum_manager_address");
delete_option("impressum_manager_address_extra");
delete_option("impressum_manager_place");
delete_option("impressum_manager_zip");
delete_option("impressum_manager_country");
delete_option("impressum_manager_fax");
delete_option("impressum_manager_email");
delete_option("impressum_manager_phone");
delete_option("impressum_manager_authorized_person");
delete_option("impressum_manager_vat");
delete_option("impressum_manager_register");
delete_option("impressum_manager_registenr");
delete_option("impressum_manager_regulated_profession");
delete_option("impressum_manager_state");
delete_option("impressum_manager_state_rules");
delete_option("impressum_manager_chamber");
delete_option("impressum_manager_image_source");
delete_option("impressum_manager_responsible_chamber");
delete_option("impressum_manager_responsible_persons");
delete_option("impressum_manager_disclaimer");
delete_option("impressum_manager_set_impressum");
delete_option("impressum_manager_language_of_impressum");
delete_option("impressum_manager_general_privacy_policy");
delete_option("impressum_manager_policy_facebook");
delete_option("impressum_manager_policy_google_analytics");
delete_option("impressum_manager_regulated_profession_checked");
delete_option("impressum_manager_allowness");
delete_option("impressum_manager_press_content");
delete_option("impressum_manager_disabled");
delete_option("impressum_manager_notice");
delete_option("impressum_manager_extra_field");
delete_option("impressum_manager_page");
delete_option("impressum_manager_id");
delete_option("impressum_manager_policy_google_plus");
delete_option("impressum_manager_policy_twitter");
delete_option("impressum_manager_onboarding_conf");
delete_option("impressum_manager_register_court");
delete_option("impressum_manager_surveillance_authority");
delete_option("impressum_manager_rules_link");
delete_option("impressum_manager_professional_liability_insurance_checked");
delete_option("impressum_manager_name_and_adress");
delete_option("impressum_manager_space_of_appliance");
delete_option("impressum_manager_noindex");
delete_option("impressum_manager_show_email_as_image");
delete_option("impressum_manager_policy_google_adsense");

unregister_setting("plugin-policy_group", "impressum_manager_disclaimer");
unregister_setting("plugin-policy_group", "impressum_manager_set_impressum");
unregister_setting("plugin-policy_group", "impressum_manager_language_of_impressum");
unregister_setting("plugin-policy_group", "impressum_manager_general_privacy_policy");
unregister_setting("plugin-policy_group", "impressum_manager_policy_facebook");
unregister_setting("plugin-policy_group", "impressum_manager_policy_google_analytics");
unregister_setting("plugin-policy_group", "impressum_manager_policy_google_adsense");
unregister_setting("plugin-policy_group", "impressum_manager_policy_twitter");
unregister_setting("plugin-policy_group", "impressum_manager_policy_google_plus");

// no databases used, finishing
