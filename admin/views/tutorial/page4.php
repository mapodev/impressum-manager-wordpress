<form action="<?= Impressum_Manager_Admin::get_page_url() ?>&view=config&skip_start=true&tut_finished=true" method="post">
	<table class="form-table">
		<tbody>
		<?php include(plugin_dir_path(__FILE__) . "../settingforms/forms-impressum-config.php"); ?>
		</tbody>
	</table>
	<table>
		<tr>
			<td>
				<a href="options-general.php?page=<?= SLUG ?>&view=tutorial&skip_start_temp=true&step=3">
					<input type="button" class="button button-secondary"
					       value="<?= __( "Schritt zurück", SLUG ) ?>"
					       style="margin-top: 5px">
				</a>
			</td>
			<td>
				<?= submit_button( __( "Impressum speichern", SLUG ) ) ?>
			</td>
		</tr>
	</table>
</form>