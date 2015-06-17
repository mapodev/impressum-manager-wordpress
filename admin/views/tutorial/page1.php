<form action="<?= Impressum_Manager_Admin::get_page_url() ?>&view=tutorial&skip_start_temp=true&step=2" method="post">
	<table class="form-table">
		<tbody>
		<?php Form_Factory::get_person_type(); ?>
		<?php Form_Factory::get_legal_form(); ?>
		<?php Form_Factory::get_organisation(); ?>
		<?php Form_Factory::get_telephone(); ?>
		<?php Form_Factory::get_fax(); ?>
		<?php Form_Factory::get_email(); ?>
		<?php Form_Factory::get_authorized_persons(); ?>
		</tbody>
		<tr>
			<td>
				<?= submit_button( __( "Nächster Schritt", SLUG ) ) ?>
			</td>
		</tr>
	</table>
</form>