<?php
Impressum_Manager_Admin::save_option( "impressum_manager_notice", "dismissed" );
?>

<form method="post" action="options.php">
	<?php
	settings_fields( 'impressum-manager-settings' );
	do_settings_sections( 'impressum-manager-settings' );
	?>
	<table class="form-table" id="settings-options">
		<tbody>
		<?php Impressum_Manager_Form_Factory::get_impressum_config() ?>
		<?php Impressum_Manager_Form_Factory::get_source_from(); ?>
		<?php Impressum_Manager_Form_Factory::get_powered_by(); ?>
		<?php Impressum_Manager_Form_Factory::get_disclaimer(); ?>
		</tbody>
	</table>

	<?php submit_button( __( "Impressum aktualisieren" ) ); ?>
</form>
