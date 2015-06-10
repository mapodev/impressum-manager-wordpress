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

<?php
$option_url = Impressum_Manager_Admin::get_page_url();
?>

<form action="<?= $option_url ?>&view=tutorial&skip_start_temp=true&step=2" method="post">
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
		<table>
		<tr>
			<td>
				<a href="options-general.php?page=<?= Impressum_Manager_Admin::get_instance()->get_slug() ?>">
					<input type="button" class="button button-secondary"
					       value="<?= __("Zurück zu den Einstellungen", $this->slug) ?>"
					       style="margin-top: 5px">
				</a>
			</td>
			<td>
				<?= submit_button(__("Nächster Schritt", $this->slug)) ?>
			</td>
		</tr>
		</table>
</form>