<form action="<?= Impressum_Manager_Admin::get_page_url() ?>&view=tutorial&skip_start_temp=true&step=3" method="post">
	<table class="form-table">
		<?php include(plugin_dir_path(__FILE__) . "../settingforms/forms-rest.php"); ?>
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