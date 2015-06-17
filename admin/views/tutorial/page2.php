<form action="<?= Impressum_Manager_Admin::get_page_url() ?>&view=tutorial&skip_start_temp=true&step=3" method="post">
	<table class="form-table">
		<tbody>
		<?php Form_Factory::get_register(); ?>
		<?php Form_Factory::get_vat(); ?>
		<?php Form_Factory::get_professional_liability_insurance(); ?>
		<?php Form_Factory::get_responsible_persons(); ?>
		<?php Form_Factory::get_image_sources(); ?>
		<?php Form_Factory::get_surveillance_authority(); ?>
		<?php Form_Factory::get_regulated_profession(); ?>
		</tbody>
	</table>
	<table>
		<tr>
			<td>
				<a href="options-general.php?page=<?= SLUG ?>&view=tutorial&skip_start_temp=true&step=1">
					<input type="button" class="button button-secondary"
					       value="<?= __( "Schritt zurück", SLUG ) ?>"
					       style="margin-top: 5px">
				</a>
			</td>
			<td>
				<?= submit_button( __( "Nächster Schritt", SLUG ) ) ?>
			</td>
		</tr>
	</table>
</form>