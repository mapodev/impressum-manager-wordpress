<form action="<?= Impressum_Manager_Admin::get_page_url() ?>&view=config&skip_start=true&tut_finished=true" method="post">
	<table class="form-table">
		<tbody>
		<tr>
			<th scope="row"><?= __("No Index", SLUG) ?></th>
			<td>
				<label for="impressum_manager_noindex">
					<input id="impressum_manager_noindex" type="checkbox"
					       name="impressum_manager_noindex" <?= checked("on", get_option("impressum_manager_noindex"), false) ?>>
					<?= __("Lass die Impressum Seite nicht von Suchmaschinen indexieren.", SLUG) ?>
				</label>
			</td>
		</tr>
		<tr>
			<th scope="row"><?= __("E-Mail as Image", SLUG) ?></th>
			<td>
				<label for="impressum_manager_show_email_as_image">
					<input id="impressum_manager_show_email_as_image" type="checkbox"
					       name="impressum_manager_show_email_as_image" <?= checked("on", get_option("impressum_manager_show_email_as_image"), false) ?>>
					<?= __("Show E-Mail as Image to prevent Spam.", SLUG) ?>
				</label>
			</td>
		</tr>
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