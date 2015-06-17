<?php
Impressum_Manager_Admin::save_option("impressum_manager_notice","dismissed");

if (@$_GET['tut_finished'] == true && array_key_exists("submit", $_REQUEST)) {
	Impressum_Manager_Admin::save_option("impressum_manager_noindex", @$_POST['impressum_manager_noindex']);
	Impressum_Manager_Admin::save_option("impressum_manager_show_email_as_image", @$_POST['impressum_manager_show_email_as_image']);
}

?>
<form method="post" action="options.php">
	<?php settings_fields('impressum-manager-policy_group'); ?>
	<?php do_settings_sections('impressum-manager-policy_group'); ?>
	<table class="form-table">
		<tbody>
		<?php include(plugin_dir_path(__FILE__) . "settingforms/forms-impressum-config.php"); ?>
		<?php include(plugin_dir_path(__FILE__) . "settingforms/forms-disclaimer.php"); ?>
		</tbody>
	</table>
	<?php submit_button(__("Impressum aktualisieren")); ?>
</form>