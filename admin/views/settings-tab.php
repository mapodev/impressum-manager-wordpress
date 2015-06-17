<form method="post" action="options.php">
	<?php settings_fields( 'impressum-manager-settings-group' ); ?>
	<?php do_settings_sections( 'impressum-manager-settings-group' ); ?>
	<table class="form-table">
		<?php include( plugin_dir_path( __FILE__ ) . "/settingforms/forms-kind-of-person.php" ); ?>
		<?php include( plugin_dir_path( __FILE__ ) . "/settingforms/forms-rest.php" ); ?>

		<table>
			<tr>
				<td>
					<?php submit_button( __( "Impressum aktualisieren" ) ); ?>
				</td>
			</tr>
		</table>
</form>


