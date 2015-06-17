<form method="post" action="options.php">
	<?php settings_fields( 'impressum-manager-settings-group' ); ?>
	<?php do_settings_sections( 'impressum-manager-settings-group' ); ?>
	<table class="form-table">
		<?php Form_Factory::get_person_type(); ?>
		<?php Form_Factory::get_legal_form(); ?>
		<?php Form_Factory::get_organisation(); ?>
		<?php Form_Factory::get_telephone(); ?>
		<?php Form_Factory::get_fax(); ?>
		<?php Form_Factory::get_email(); ?>
		<?php Form_Factory::get_authorized_persons(); ?>
		<?php Form_Factory::get_register(); ?>
		<?php Form_Factory::get_vat(); ?>
		<?php Form_Factory::get_professional_liability_insurance(); ?>
		<?php Form_Factory::get_responsible_persons(); ?>
		<?php Form_Factory::get_image_sources(); ?>
		<?php Form_Factory::get_surveillance_authority(); ?>
		<?php Form_Factory::get_regulated_profession(); ?>


		<table>
			<tr>
				<td>
					<?php submit_button( __( "Impressum aktualisieren" ) ); ?>
				</td>
			</tr>
		</table>
</form>


