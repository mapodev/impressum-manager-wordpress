<?php
Impressum_Manager_Admin::save_option("impressum_manager_notice","dismissed");

if (@$_GET['tut_finished'] == true && array_key_exists("submit", $_REQUEST)) {
	Impressum_Manager_Admin::save_option("impressum_manager_noindex", @$_POST['impressum_manager_noindex']);
	Impressum_Manager_Admin::save_option("impressum_manager_show_email_as_image", @$_POST['impressum_manager_show_email_as_image']);
}

?>

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
				<?= __("Impressum konfigurieren") ?>
			</th>
			<td>
				<input class="button" type="submit" value="<?= _e('Impressum konfigurieren') ?>">
			</td>
		</tr>
		</tbody>
	</table>
</form>
<form method="post" action="options.php">
	<?php settings_fields('impressum-manager-policy_group'); ?>
	<?php do_settings_sections('impressum-manager-policy_group'); ?>
	<table class="form-table">
		<tbody>
		<!--tr>
                    <th scope="row"><?= __("Language", SLUG) ?></th>
                    <td>
                        <select name="impressum_manager_language_of_impressum" style="width: 340px">
                            <option>Wähle dein Land ...</option>
                            <option value="DE" <?php
		if (get_option("impressum_manager_language_of_impressum") == "DE") {
			echo "selected=selected";
		}
		?>>Deutsch
                            </option>
                        </select><br><br>
                        <?= __("Wähle die Sprache für dein Impressum", SLUG) ?>
                    </td>
                </tr-->
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
			<th colspan="2"><h2><?= __("Impressum Inhalt Einstellungen", SLUG) ?></h2></th>
		</tr>
		<tr>
			<th>
				<?= __("Haftungsausschluss (Disclaimer)", SLUG) ?>
			</th>
			<td>
				<label for="impressum_manager_disclaimer">
					<input id="impressum_manager_disclaimer" type="checkbox"
					       name="impressum_manager_disclaimer" <?= checked("on", get_option("impressum_manager_disclaimer"), false) ?>>
					<?= __("Füge einen Disclaimer in dein Impressum ein.", SLUG) ?>
				</label>
			</td>
		</tr>
		<tr>
			<th>
				<?= __("Allgemine Datenschutzerklärung", SLUG) ?>
			</th>
			<td>
				<label for="impressum_manager_general_privacy_policy">
					<input id="impressum_manager_general_privacy_policy" type="checkbox"
					       name="impressum_manager_general_privacy_policy" <?= checked("on", get_option("impressum_manager_general_privacy_policy"), false) ?>>
					<?= __("Füge eine allgemeine Datenschutzerklärung in dein Impressum ein.", SLUG) ?>
				</label>
			</td>
		</tr>
		<tr>
			<th>
				<?= __("Datenschutzerklärung für Facebook", SLUG) ?>
			</th>
			<td>
				<label for="impressum_manager_policy_facebook">
					<input id="impressum_manager_policy_facebook" type="checkbox"
					       name="impressum_manager_policy_facebook" <?= checked("on", get_option("impressum_manager_policy_facebook"), false) ?>>
					<?= __("Füge eine Datenschutzerklärung für die Nutzung von Facebook Elementen in dein Impressum ein.", SLUG) ?>
				</label>
			</td>
		</tr>
		<tr>
			<th>
				<?= __("Datenschutzerklärung für Google", SLUG) ?>
			</th>
			<td>
				<label for="impressum_manager_policy_google_analytics">
					<input id="impressum_manager_policy_google_analytics" type="checkbox"
					       name="impressum_manager_policy_google_analytics" <?= checked("on", get_option("impressum_manager_policy_google_analytics"), false) ?>>
					<?= __("Füge eine Datenschutzerklärung für die Nutzung von <b>Google Analytics</b> in dein Impressum ein.", SLUG) ?>
				</label>
				<br><br>
				<label for="impressum_manager_policy_google_adsense">
					<input id="impressum_manager_policy_google_adsense" type="checkbox"
					       name="impressum_manager_policy_google_adsense" <?= checked("on", get_option("impressum_manager_policy_google_adsense"), false) ?>>
					<?= __("Füge eine Datenschutzerklärung für die Nutzung von <b>Google Adsense</b> in dein Impressum ein.", SLUG) ?>
				</label>
				<br><br>
				<label for="impressum_manager_policy_google_plus">
					<input id="impressum_manager_policy_google_plus" type="checkbox"
					       name="impressum_manager_policy_google_plus" <?= checked("on", get_option("impressum_manager_policy_google_plus"), false) ?>>
					<?= __("Füge eine Datenschutzerklärung für die Nutzung von <b>Google +1</b> in dein Impressum ein.", SLUG) ?>
				</label>
			</td>
		</tr>
		<tr>
			<th>
				<?= _e("Datenschutzerklärung für Twitter") ?>
			</th>
			<td>
				<label for="impressum_manager_policy_twitter">
					<input id="impressum_manager_policy_twitter" type="checkbox"
					       name="impressum_manager_policy_twitter" <?= checked("on", get_option("impressum_manager_policy_twitter"), false) ?>>
					<?= __("Füge eine Datenschutzerklärung für die Nutzung von Twitter Elementen in dein Impressum ein.", SLUG) ?>
				</label>
			</td>
		</tr>
		<tr>
			<th>
				<?= __("Zusatzfeld", SLUG) ?>
			</th>
			<td>
                        <textarea style="width:500px; height: 200px;"
                                  name="impressum_manager_extra_field"><?= get_option("impressum_manager_extra_field") ?></textarea>
			</td>
		</tr>
		</tbody>
	</table>
	<?php submit_button(__("Impressum aktualisieren")); ?>
</form>