<!-- Seite 1 Skript -->

<script type="text/javascript">
	(function ($) {
		$(document).ready(function () {
			$("#person_1").click(function () {
				$(".rechtsform").fadeOut();
				$("#full_name").text("<?=__("Vollständiger Name")?>");
			});
			$("#person_2").click(function () {
				$(".rechtsform").fadeIn();
				$("#full_name").text("<?=__("Firmenname inkl. Rechtsform")?>");
			})
		});
	}(jQuery));
</script>
<br>

<!-- Seite 2 Skript -->

<?php
$person = get_option("impressum_manager_person");

if ($person == 1) {
	$cssDef = "style='display:none;'";
} else if ($person == 2) {
	$cssDef = "";
}

?>

<script type="text/javascript">
	(function ($) {
		$(document).ready(function () {
			$("#press_content_textarea").hide();
			$("#allowness_textarea").hide();
			$(".hide_regulated_profession").hide();

			if ($("#press_content").attr("checked") == true || $("#press_content").attr("checked") == "checked") {
				$("#press_content_textarea").show();
			}

			if ($("#allowness").attr("checked") == true || $("#allowness").attr("checked") == "checked") {
				$("#allowness_textarea").show();
			}

			if ($("#regulated_profession").attr("checked") == true || $("#regulated_profession").attr("checked") == "checked") {
				$(".hide_regulated_profession").show();
			}

			$("#press_content").click(function () {
				if ($(this).attr("checked")) {
					$("#press_content_textarea").show();
				} else {
					$("#press_content_textarea").hide();
				}
			});

			$("#allowness").click(function () {
				if ($(this).attr("checked")) {
					$("#allowness_textarea").show();
				} else {
					$("#allowness_textarea").hide();
				}
			});

			$("#regulated_profession").click(function () {
				if ($(this).attr("checked")) {
					$(".hide_regulated_profession").show();
				} else {
					$(".hide_regulated_profession").hide();
				}
			});
		});
	}(jQuery));
</script>


<form method="post" action="options.php">
	<?php settings_fields('impressum-manager-policy_group'); ?>
	<?php do_settings_sections('impressum-manager-policy_group'); ?>

	<table class="form-table">
		<tr valign="top">
			<th scope="row" colspan="2"><b><?= __("Art der Person", $this->slug) ?></b></th>
		</tr>
		<tr valign="top">
			<td width="5"><input type="radio" id="person_1" name="impressum_manager_person"
			                     value="1" <?php
				if (get_option("impressum_manager_person") == '1') {
					echo "checked=checked";
				}
				?>>
			</td>
			<td>Privatperson</td>
		</tr>
		<tr valign="top">
			<td><input type="radio" id="person_2" name="impressum_manager_person"
			           value="2" <?php
				if (get_option("impressum_manager_person") == '2') {
					echo "checked=checked";
				}
				?>>
			</td>
			<td><?= __("Juristische Person (z.B. Firma, Verein, Organisation, Einrichtung)") ?></td>
		</tr>
	</table>
	<table class="form-table">
		<tr valign="top" class="rechtsform">
			<th scope="row" colspan="2" style="width: 300px"><b><?= __("Rechtsform") ?></b></th>
		</tr>
		<tr valign="top" class="rechtsform">
			<td colspan="2">
				<select name="impressum_manager_form_of_organization">
					<?php
					$forms_of_organization = array(
						__("Einzelunternehmen", $this->slug),
						__("Stille Gesellschaft", $this->slug),
						__("Offene Handelsgesellschaft (OHG)", $this->slug),
						__("Kommanditgesellschaft (KG)", $this->slug),
						__("Gesellschaft bürgerlichen Rechts (GdR)", $this->slug),
						__("Aktiengesellschaft (AG)", $this->slug),
						__("Kommanditgesellschaft auf Aktien (KGaA)", $this->slug),
						__("Gesellschaft mit beschränkter Haftung (GmbH)", $this->slug),
						__("Genossenschaft (eG)", $this->slug)
					);

					$idx = 1;
					foreach ($forms_of_organization as $org_form) {
						?>
						<option value="<?= $idx ?>" <?php
						if ($idx == get_option("impressum_manager_form_of_organization")) {
							echo "selected=selected";
						}
						?>><?= $org_form ?></option>
						<?php
						$idx++;
					}
					?>
				</select>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row" colspan="2"><b><?= __("Angaben zur Organisation", $this->slug) ?></b></th>
		</tr>
		<tr>
			<td colspan="2">
				<input type="text" style="width: 340px" name="impressum_manager_name_company"
				       title="Company Name"
				       value="<?= get_option("impressum_manager_name_company") ?>"><br>
				<small id="full_name"><?= __("Vollständiger Name", $this->slug) ?></small>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="text" name="impressum_manager_address" title="Address" style="width: 340px"
				       value="<?= get_option("impressum_manager_address") ?>"><br>
				<small><?= __("Straße & Hausnummer", $this->slug) ?></small>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="text" name="impressum_manager_address_extra" title="Address Extra"
				       style="width: 340px" value="<?= get_option("impressum_manager_address_extra") ?>"><br>
				<small><?= __("Adresszusatz", $this->slug) ?></small>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<table>
					<tr>
						<td style="padding: 0;"><input type="text" name="impressum_manager_place"
						                               title="Place"
						                               value="<?= get_option("impressum_manager_place") ?>"><br>
							<small><?= __("Ort") ?></small>
						</td>
						<td style="padding: 0;"><input type="text" name="impressum_manager_zip"
						                               title="ZIP Code"
						                               value="<?= get_option("impressum_manager_zip") ?>"><br>
							<small><?= __("PLZ") ?></small>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<select name="impressum_manager_country" style="width: 340px">
					<option value="no_land_choosen"><?= __("Wähle dein Land ...") ?></option>
					<?php

					foreach ($this->_countries as $country_code => $country_name) {
						if (get_option("impressum_manager_country") == $country_code) {
							$s = "selected=selected";
						} else {
							$s = "";
						}

						?>
						<option
							value="<?= $country_code ?>" <?= $s ?>><?= __($country_name, $this->slug) ?></option>
					<?php
					}

					?>
				</select><br>
				<small>Land</small>
			</td>
		</tr>
		<tr>
			<th colspan="2">
				<b><?= __("Telefonnummer (inkl. Vorwahl)", $this->slug) ?></b>
			</th>
		</tr>
		<tr>
			<td colspan="2">
				<input type="text" name="impressum_manager_phone" title="Phone Number"
				       style="width: 340px"
				       value="<?= get_option("impressum_manager_phone") ?>">
			</td>
		</tr>
		<tr>
			<th colspan="2">
				<b><?= __("Faxnummer (optional)", $this->slug) ?></b>
			</th>
		</tr>
		<tr>
			<td colspan="2">
				<input type="text" name="impressum_manager_fax" title="Fax Number" style="width: 340px"
				       value="<?= get_option("impressum_manager_fax") ?>">
			</td>
		</tr>
		<tr>
			<th colspan="2">
				<b><?= __("E-Mail Adresse", $this->slug) ?></b>
			</th>
		</tr>
		<tr>
			<td colspan="2">
				<input type="text" name="impressum_manager_email" title="E-Mail Address"
				       style="width: 340px"
				       value="<?= get_option("impressum_manager_email") ?>">
			</td>
		</tr>
	</table>



<!-- Seite 2
</form>
<form action="<?= $option_url ?>&setup=true&step=3" method="post">
-->
	<table class="form-table" <?= $cssDef ?>>
		<tr valign="top">
			<th scope="row" colspan="2"><b><?= __("Vertretungsberechtigte Persone(n)", $this->slug) ?></b>
			</th>
		</tr>
		<tr valign="top">
			<td colspan="2">
                        <textarea name="impressum_manager_authorized_person"
                                  style="width: 340px; height: 225px;"><?= get_option("impressum_manager_authorized_person") ?></textarea><br>
				<small><?= __("Namen und Vornamen", $this->slug) ?></small>
			</td>
		</tr>
	</table>
	<table class="form-table">
		<tr valign="top" <?= $cssDef ?>>
			<th scope="row" colspan="2"><b><?= __("Umsatzsteuer ID", $this->slug) ?></b></th>
		</tr>
		<tr valign="top" <?= $cssDef ?>>
			<td colspan="2">
				<input type="text" name="impressum_manager_vat" title="VAT" style="width: 340px"
				       value="<?= get_option("impressum_manager_vat") ?>">
			</td>
		</tr>
		<tr valign="top" <?= $cssDef ?>>
			<th scope="row" colspan="2"><b><?= __("Register", $this->slug) ?></b></th>
		</tr>
		<tr valign="top" <?= $cssDef ?>>
			<td colspan="2">
				<select name="impressum_manager_register">
					<?php
					$registerDescr = array(
						__("Kein Register", $this->slug),
						__("Genossenschaftsregister", $this->slug),
						__("Handelsregister", $this->slug),
						__("Partnerschaftsregister", $this->slug),
						__("Vereinsregister", $this->slug)
					);

					$idx = 1;

					echo get_option("impressum_manager_register");

					foreach ($registerDescr as $registerName) {
						if (get_option("impressum_manager_register") == $idx) {
							$selected = "selected=selected";
						} else {
							$selected = "";
						}
						?>
						<option value="<?= $idx ?>" <?= $selected ?>><?= $registerName ?></option>
						<?php
						$idx++;
					}

					?>
				</select>
			</td>
		</tr>

		<tr valign="top" <?= $cssDef ?>>
			<th scope="row" colspan="2"><b><?= __("Registernummer", $this->slug) ?></b></th>
		</tr>
		<tr valign="top" <?= $cssDef ?>>
			<td colspan="2">
				<input type="text" name="impressum_manager_registenr" title="Registernummer"
				       style="width: 340px"
				       value="<?= get_option("impressum_manager_registenr") ?>">
			</td>
		</tr>
	</table>
	<table class="form-table">
		<tr valign="top">
			<th scope="row" colspan="2"><input type="checkbox" id="regulated_profession"
			                                   name="impressum_manager_regulated_profession_checked" <?= $this->isChecked("impressum_manager_regulated_profession_checked") ?>><label
					for="regulated_profession"><b><?= __("Reglementierter Beruf", $this->slug) ?></b></label>
			</th>
		</tr>
		<tr valign="top" class="hide_regulated_profession">
			<td colspan="2">
				<input type="text" name="impressum_manager_regulated_profession"
				       title="Regulated profession"
				       style="width: 340px"
				       value="<?= get_option("impressum_manager_regulated_profession") ?>"><br>
				<small><?= __("Gesetzliche Berufsbezeichnung", $this->slug) ?></small>
			</td>
		</tr>
		<tr valign="top" class="hide_regulated_profession">
			<td colspan="2">
				<input type="text" name="impressum_manager_state" title="State"
				       style="width: 340px" value="<?= get_option("impressum_manager_state") ?>"><br>
				<small><?= __("Staat, in dem die Berufsbezeichnung verliehen wurde", $this->slug) ?></small>
			</td>
		</tr>
		<tr valign="top" class="hide_regulated_profession">
			<td colspan="2">
				<input type="text" name="impressum_manager_state_rules" title="State rules"
				       style="width: 340px"
				       value="<?= get_option("impressum_manager_state_rules") ?>"><br>
				<small><?= __("Berfusrechtliche Regelungen (Bezeichnung)", $this->slug) ?></small>
			</td>
		</tr>
		<tr valign="top" class="hide_regulated_profession">
			<td colspan="2">
				<input type="text" name="impressum_manager_chamber" title="Chamber"
				       style="width: 340px" value="<?= get_option("impressum_manager_chamber") ?>"><br>
				<small><?= __("Kammer, der Sie angehören", $this->slug) ?></small>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row" colspan="2"><input type="checkbox" id="allowness"
			                                   name="impressum_manager_allowness" <?= $this->isChecked("impressum_manager_allowness") ?>><label
					for="allowness"><b><?= __("Behördliche Zuslassung", $this->slug) ?></b></label></th>
		</tr>
		<tr valign="top" id="allowness_textarea">
			<td colspan="2">
                        <textarea name="impressum_manager_responsible_chamber"
                                  style="width: 340px; height: 225px;"><?= get_option("impressum_manager_responsible_chamber") ?></textarea><br>
				<small><?= __("Zuständige Aufsichtsbehörde", $this->slug) ?></small>
			</td>
		</tr>
	</table>
	<table class="form-table">
		<tr valign="top">
			<th scope="row" colspan="2"><b><?= __("Bildquellen", $this->slug) ?></b></th>
		</tr>
		<tr valign="top">
			<td colspan="2">
                        <textarea name="impressum_manager_image_source"
                                  style="width: 340px; height: 225px;"><?= get_option("impressum_manager_image_source") ?></textarea><br>
				<small><?= __("z.B. Max Mustermann, http://www.fotolia.com", $this->slug) ?></small>
			</td>
		</tr>

		<tr valign="top">
			<th scope="row" colspan="2"><input type="checkbox" id="press_content"
			                                   name="impressum_manager_press_content" <?= $this->isChecked("impressum_manager_press_content") ?>
				<label
					for="press_content"><b><?= __("journalistisch-redaktionelle Inhalte", $this->slug) ?></b></label>
			</th>
		</tr>
		<tr valign="top" id="press_content_textarea">
			<td colspan="2">
                        <textarea name="impressum_manager_responsible_persons"
                                  style="width: 340px; height: 225px;"><?= get_option("impressum_manager_responsible_persons") ?></textarea><br>
				<small><?= __("Vor-, Nachname inkl. Anschrift angeben. Bei mehreren Verantwortlichen die
                                        Verantwortungen entsprechend mit angeben.", $this->slug) ?>
				</small>
			</td>
		</tr>



<!-- Seite 3
</form>
<form action="<?= $option_url ?>&finish=true&firstset=true" method="post">

-->
		<tbody>
		<tr>
			<th>
				<?= __("Haftungsausschluss (Disclaimer)", $this->slug) ?>
			</th>
			<td>
				<label for="impressum_manager_disclaimer">
					<input id="impressum_manager_disclaimer" type="checkbox"
					       name="impressum_manager_disclaimer" <?= $this->isChecked("impressum_manager_disclaimer") ?>>
					<?= __("Füge einen Disclaimer in dein Impressum ein.", $this->slug) ?>
				</label>
			</td>
		</tr>
		<tr>
			<th>
				<?= __("Allgemine Datenschutzerklärung", $this->slug) ?>
			</th>
			<td>
				<label for="impressum_manager_general_privacy_policy">
					<input id="impressum_manager_general_privacy_policy" type="checkbox"
					       name="impressum_manager_general_privacy_policy" <?= $this->isChecked("impressum_manager_general_privacy_policy") ?>>
					<?= __("Füge eine allgemeine Datenschutzerklärung in dein Impressum ein.", $this->slug) ?>
				</label>
			</td>
		</tr>
		<tr>
			<th>
				<?= __("Datenschutzerklärung für Facebook", $this->slug) ?>
			</th>
			<td>
				<label for="impressum_manager_policy_facebook">
					<input id="impressum_manager_policy_facebook" type="checkbox"
					       name="impressum_manager_policy_facebook" <?= $this->isChecked("impressum_manager_policy_facebook") ?>>
					<?= __("Füge eine Datenschutzerklärung für die Nutzung von Facebook Elementen in dein Impressum ein.", $this->slug) ?>
				</label>
			</td>
		</tr>
		<tr>
			<th>
				<?= __("Datenschutzerklärung für Google", $this->slug) ?>
			</th>
			<td>
				<label for="impressum_manager_policy_google_analytics">
					<input id="impressum_manager_policy_google_analytics" type="checkbox"
					       name="impressum_manager_policy_google_analytics" <?= $this->isChecked("impressum_manager_policy_google_analytics") ?>>
					<?= __("Füge eine Datenschutzerklärung für die Nutzung von <b>Google Analytics</b> in dein Impressum ein.", $this->slug) ?>
				</label>
				<br><br>
				<label for="impressum_manager_policy_google_adsense">
					<input id="impressum_manager_policy_google_adsense" type="checkbox"
					       name="impressum_manager_policy_google_adsense" <?= $this->isChecked("impressum_manager_policy_google_adsense") ?>>
					<?= __("Füge eine Datenschutzerklärung für die Nutzung von <b>Google Adsense</b> in dein Impressum ein.", $this->slug) ?>
				</label>
				<br><br>
				<label for="impressum_manager_policy_google_plus">
					<input id="impressum_manager_policy_google_plus" type="checkbox"
					       name="impressum_manager_policy_google_plus" <?= $this->isChecked("impressum_manager_policy_google_plus") ?>>
					<?= __("Füge eine Datenschutzerklärung für die Nutzung von <b>Google +1</b> in dein Impressum ein.", $this->slug) ?>
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
					       name="impressum_manager_policy_twitter" <?= $this->isChecked("impressum_manager_policy_twitter") ?>>
					<?= __("Füge eine Datenschutzerklärung für die Nutzung von Twitter Elementen in dein Impressum ein.", $this->slug) ?>
				</label>
			</td>
		</tr>
		<tr>
			<th>
				<!--<?= __("Zusatzfeld", $this->slug) ?>-->
			</th>
			<td>
                        <textarea style="width:500px; height: 200px;"
                                  name="impressum_manager_extra_field"><?= get_option("impressum_manager_extra_field") ?></textarea>
			</td>
		</tr>
		</tbody>
	</table>
	<table>
		<tr>
			<td>
				<?php submit_button(__("Impressum aktualisieren")); ?>
			</td>
		</tr>
	</table>
</form>


