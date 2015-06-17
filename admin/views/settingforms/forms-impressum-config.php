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
<tr>