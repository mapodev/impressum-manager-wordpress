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