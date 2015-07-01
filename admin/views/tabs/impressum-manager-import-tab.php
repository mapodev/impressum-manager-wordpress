<form method="post" action="options.php">
	<?php
	settings_fields( 'impressum-manager-import-tab' );
	do_settings_sections( 'impressum-manager-import-tab' );
	?>
	<table class="form-table" id="settings-options">
		<tbody>
		<tr>
			<th>
				<?= __( "URL zum Impressum" ) ?>
			</th>
			<td>
				<input type="text" name="impressum_manager_imported_impressum_url"
				       value="<?= get_option( "impressum_manager_imported_impressum_url" ) ?>"
				       placeholder="http://www.">
			</td>
		</tr>
		<tr>
			<th>
				<?= __( "URL zum Datenschutz" ) ?>
			</th>
			<td>
				<input type="text" name="impressum_manager_imported_policy_url"
				       value="<?= get_option( "impressum_manager_imported_policy_url" ) ?>" placeholder="http://www.">
			</td>
		</tr>
		</tbody>
	</table>

	<?php submit_button( __( "Impressum aktualisieren" ) ); ?>
</form>