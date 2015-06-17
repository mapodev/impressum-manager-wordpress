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

<tr valign="top">
	<th scope="row"><b><?= __( "Art der Person", SLUG ) . " " ?>
	</th>
	<td>
		<fieldset>
			<label>
				<input type="radio" id="person_1" name="impressum_manager_person"
				       value="1" <?php
				if ( get_option( "impressum_manager_person" ) == '1' ) {
					echo "checked=checked";
				}
				?>>
				<span>Privatperson</span>
			</label>
			<br>
			<label>
				<input type="radio" id="person_2" name="impressum_manager_person"
				       value="2" <?php
				if ( get_option( "impressum_manager_person" ) == '2' ) {
					echo "checked=checked";
				}
				?>>
				<span><?= __( "Juristische Person (z.B. Firma, Verein, Organisation, Einrichtung)" ) ?></span>
			</label>
		</fieldset>
	</td>
</tr>
<tr valign="top" class="rechtsform">
	<th scope="row"><b><?= __( "Rechtsform" ) ?></b></th>
	<td>
		<select name="impressum_manager_form_of_organization">
			<?php
			$forms_of_organization = array(
				__( "Einzelunternehmen", SLUG ),
				__( "Stille Gesellschaft", SLUG ),
				__( "Offene Handelsgesellschaft (OHG)", SLUG ),
				__( "Kommanditgesellschaft (KG)", SLUG ),
				__( "Gesellschaft bürgerlichen Rechts (GdR)", SLUG ),
				__( "Aktiengesellschaft (AG)", SLUG ),
				__( "Kommanditgesellschaft auf Aktien (KGaA)", SLUG ),
				__( "Gesellschaft mit beschränkter Haftung (GmbH)", SLUG ),
				__( "Genossenschaft (eG)", SLUG )
			);

			$idx = 1;
			foreach ( $forms_of_organization as $org_form ) {
				?>
				<option value="<?= $idx ?>" <?php
				if ( $idx == get_option( "impressum_manager_form_of_organization" ) ) {
					echo "selected=selected";
				}
				?>><?= $org_form ?></option>
				<?php
				$idx ++;
			}
			?>
		</select>
	</td>
</tr>
<tr valign="top">
	<th scope="row"><b><?= __( "Angaben zur Organisation", SLUG ) ?></b></th>


	<td>
		<fieldset>
			<input type="text" name="impressum_manager_name_company"
			       title="Company Name"
			       value="<?= get_option( "impressum_manager_name_company" ) ?>">
			<br>
			<small id="full_name"><?= __( "Vollständiger Name", SLUG ) ?></small>
			<br>
			<input type="text" name="impressum_manager_address" title="Address"
			       value="<?= get_option( "impressum_manager_address" ) ?>">
			<br>
			<small><?= __( "Straße & Hausnummer", SLUG ) ?></small>
			<br>
			<input type="text" name="impressum_manager_address_extra" title="Address Extra"
			       value="<?= get_option( "impressum_manager_address_extra" ) ?>"><br>
			<small><?= __( "Adresszusatz", SLUG ) ?></small>
			<br>
			<input type="text" name="impressum_manager_place"
			       title="Place"
			       value="<?= get_option( "impressum_manager_place" ) ?>"><br>
			<small><?= __( "Ort" ) ?></small>
			<br>
			<input type="text" name="impressum_manager_zip"
			       title="ZIP Code"
			       value="<?= get_option( "impressum_manager_zip" ) ?>"><br>
			<small><?= __( "PLZ" ) ?></small>
			<br>
			<select name="impressum_manager_country">
				<option value="no_land_choosen"><?= __( "Wähle dein Land ..." ) ?></option>
				<?php

				foreach ( Impressum_Manager_Admin::$_countries as $country_code => $country_name ) {
					if ( get_option( "impressum_manager_country" ) == $country_code ) {
						$s = "selected=selected";
					} else {
						$s = "";
					}

					?>
					<option
						value="<?= $country_code ?>" <?= $s ?>><?= __( $country_name, SLUG ) ?></option>
				<?php
				}

				?>
			</select><br>
			<small>Land</small>
		</fieldset>
	</td>
</tr>
<tr>
	<th>
		<b><?= __( "Telefonnummer (inkl. Vorwahl)", SLUG ) ?></b>
	</th>
	<td>
		<input type="text" name="impressum_manager_phone" title="Phone Number"

		       value="<?= get_option( "impressum_manager_phone" ) ?>">
	</td>
</tr>
<tr>
	<th>
		<b><?= __( "Faxnummer (optional)", SLUG ) ?></b>
	</th>
	<td>
		<input type="text" name="impressum_manager_fax" title="Fax Number"
		       value="<?= get_option( "impressum_manager_fax" ) ?>">
	</td>
</tr>
<tr>
	<th>
		<b><?= __( "E-Mail Adresse", SLUG ) ?></b>
	</th>
	<td>
		<input type="text" name="impressum_manager_email" title="E-Mail Address"

		       value="<?= get_option( "impressum_manager_email" ) ?>">
	</td>
</tr>