<form action="<?= Impressum_Manager_Admin::get_page_url() ?>&view=tutorial&skip_start_temp=true&step=2" method="post">
	<table class="form-table" id="settings-options">
		<tbody>
		<?php Impressum_Manager_Form_Factory::get_person_type(); ?>
		<?php Impressum_Manager_Form_Factory::get_legal_form(); ?>
		<?php Impressum_Manager_Form_Factory::get_organisation(); ?>
		<?php Impressum_Manager_Form_Factory::get_telephone(); ?>
		<?php Impressum_Manager_Form_Factory::get_fax(); ?>
		<?php Impressum_Manager_Form_Factory::get_email(); ?>
		<?php Impressum_Manager_Form_Factory::get_authorized_persons(); ?>
		</tbody>
		<tr>
			<td>
				<?= submit_button( __( "Nächster Schritt", SLUG ) ) ?>
			</td>
		</tr>
	</table>
</form>
