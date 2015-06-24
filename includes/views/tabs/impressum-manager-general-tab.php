<?php
Impressum_Manager_Admin::save_option( "impressum_manager_notice", "dismissed" );

if ( @$_GET['tut_finished'] == true && array_key_exists( "submit", $_REQUEST ) ) {
	Impressum_Manager_Admin::save_option( "impressum_manager_noindex", @$_POST['impressum_manager_noindex'] );
	Impressum_Manager_Admin::save_option( "impressum_manager_show_email_as_image", @$_POST['impressum_manager_show_email_as_image'] );
}

?>
<p>
<form action="<?php Impressum_Manager_Admin::get_page_url() ?>">
	<input type="hidden" name="page" value="<?= SLUG ?>">
	<input type="hidden" name="view" value="tutorial"/>
	<input type="hidden" name="step" value="1"/>
	<input type="hidden" name="skip_start_temp" value="true">
	<input class="button button-primary" type="submit" id="configure_impressum"
	       value="<?= _e('Impressum konfigurieren') ?>">
</form>
</p>

<form method="post" action="options.php">
	<?php settings_fields( 'impressum-manager-settings' ); ?>
	<?php do_settings_sections( 'impressum-manager-settings' ); ?>
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
