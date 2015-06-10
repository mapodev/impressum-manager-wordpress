<form action="options-general.php">
	<table class="form-table">
		<input type="hidden" name="page"
		       value="<?= SLUG ?>">
		<input type="hidden" name="view" value="tutorial"/>
		<input type="hidden" name="step" value="1"/>
		<input type="hidden" name="skip_start_temp" value="true">
		<tbody>
		<tr>
			<th>
				<?= __( "Impressum Konfiguration" ) ?>
			</th>
			<td>
				<input class="button" type="submit" value="<?= _e( 'Impressum konfigurieren' ) ?>">
			</td>
		</tr>
		</tbody>
	</table>
</form>
<form action="options-general.php">
	<table class="form-table">
		<input type="hidden" name="page"
		       value="<?= SLUG ?>">
		<input type="hidden" name="view" value="config">
		<input type="hidden" name="skip_start" value="true">
		<input type="hidden" name="tut_finished" value="true">
		<tbody>
		<tr>
			<th>
				<?= __( "Überspringen" ) ?>
			</th>
			<td>
				<input class="button" type="submit" value="<?= _e( 'Überspringen' ) ?>">
			</td>
		</tr>
		</tbody>
	</table>
</form>