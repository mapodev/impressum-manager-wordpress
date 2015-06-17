<form method="post" action="options.php">
	<?php settings_fields( 'impressum-manager-settings-group' ); ?>
	<?php do_settings_sections( 'impressum-manager-settings-group' ); ?>
	<table class="form-table">
		<?php Impressum_Manager_Form_Factory::get_person_type(); ?>
		<?php Impressum_Manager_Form_Factory::get_legal_form(); ?>
		<?php Impressum_Manager_Form_Factory::get_organisation(); ?>
		<?php Impressum_Manager_Form_Factory::get_telephone(); ?>
		<?php Impressum_Manager_Form_Factory::get_fax(); ?>
		<?php Impressum_Manager_Form_Factory::get_email(); ?>
		<?php Impressum_Manager_Form_Factory::get_authorized_persons(); ?>
		<?php Impressum_Manager_Form_Factory::get_register(); ?>
		<?php Impressum_Manager_Form_Factory::get_vat(); ?>
		<?php Impressum_Manager_Form_Factory::get_professional_liability_insurance(); ?>
		<?php Impressum_Manager_Form_Factory::get_responsible_persons(); ?>
		<?php Impressum_Manager_Form_Factory::get_image_sources(); ?>
		<?php Impressum_Manager_Form_Factory::get_surveillance_authority(); ?>
		<?php Impressum_Manager_Form_Factory::get_regulated_profession(); ?>

		<table>
			<tr>
				<td>
					<?php submit_button( __( "Impressum aktualisieren" ) ); ?>
				</td>
			</tr>
		</table>
</form>


