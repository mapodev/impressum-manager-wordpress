<?php $person = get_option( "impressum_manager_person" );

$cssDef = "";
if ( $person == 1 ) {
	$cssDef = "style='display:none;'";
} else if ( $person == 2 ) {
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

<form action="<?= Impressum_Manager_Admin::get_page_url() ?>&view=tutorial&skip_start_temp=true&step=3" method="post">
	<table class="form-table" <?= $cssDef ?>>
		<tr valign="top">
			<th scope="row"><b><?= __( "Vertretungsberechtigte Persone(n)", SLUG ) ?></b>
			</th>

			<td>
                <textarea name="impressum_manager_authorized_person"
                                  style="width: 340px; height: 225px;"><?= get_option( "impressum_manager_authorized_person" ) ?></textarea><br>
				<small><?= __( "Namen und Vornamen", SLUG ) ?></small>
			</td>
		</tr>
	</table>
	<table class="form-table">
		<tr valign="top" <?= $cssDef ?>>
			<th scope="row"><b><?= __( "Umsatzsteuer ID", SLUG ) ?></b></th>
			<td>
				<input type="text" name="impressum_manager_vat" title="VAT" style="width: 340px"
				       value="<?= get_option( "impressum_manager_vat" ) ?>">
			</td>
		</tr>
		<tr valign="top" <?= $cssDef ?>>
			<th scope="row"><b><?= __( "Register", SLUG ) ?></b></th>
			<td>
				<select name="impressum_manager_register">
					<?php
					$registerDescr = array(
						__( "Kein Register", SLUG ),
						__( "Genossenschaftsregister", SLUG ),
						__( "Handelsregister", SLUG ),
						__( "Partnerschaftsregister", SLUG ),
						__( "Vereinsregister", SLUG )
					);

					$idx = 1;

					echo get_option( "impressum_manager_register" );

					foreach ( $registerDescr as $registerName ) {
						if ( get_option( "impressum_manager_register" ) == $idx ) {
							$selected = "selected=selected";
						} else {
							$selected = "";
						}
						?>
						<option value="<?= $idx ?>" <?= $selected ?>><?= $registerName ?></option>
						<?php
						$idx ++;
					}

					?>
				</select>
			</td>
		</tr>
		<tr valign="top" <?= $cssDef ?>>
			<th scope="row"><b><?= __( "Registernummer", SLUG ) ?></b></th>
			<td>
				<input type="text" name="impressum_manager_registenr" title="Registernummer"
				       style="width: 340px"
				       value="<?= get_option( "impressum_manager_registenr" ) ?>">
			</td>
		</tr>
	</table>
	<table class="form-table">
		<tr valign="top">
			<th scope="row"><input type="checkbox" id="regulated_profession"
			                                   name="impressum_manager_regulated_profession_checked" <?= checked( "on", get_option( "impressum_manager_regulated_profession_checked" ), false ) ?>><label
					for="regulated_profession"><b><?= __( "Reglementierter Beruf", SLUG ) ?></b></label>
			</th>


			<td class="hide_regulated_profession">
				<input type="text" name="impressum_manager_regulated_profession"
				       title="Regulated profession"
				       style="width: 340px"
				       value="<?= get_option( "impressum_manager_regulated_profession" ) ?>"><br>
				<small><?= __( "Gesetzliche Berufsbezeichnung", SLUG ) ?></small>
				<br>
				<input type="text" name="impressum_manager_state" title="State"
				       style="width: 340px" value="<?= get_option( "impressum_manager_state" ) ?>"><br>
				<small><?= __( "Staat, in dem die Berufsbezeichnung verliehen wurde", SLUG ) ?></small>
				<br>
				<input type="text" name="impressum_manager_state_rules" title="State rules"
				       style="width: 340px"
				       value="<?= get_option( "impressum_manager_state_rules" ) ?>"><br>
				<small><?= __( "Berfusrechtliche Regelungen (Bezeichnung)", SLUG ) ?></small>
				<br>
				<input type="text" name="impressum_manager_chamber" title="Chamber"
				       style="width: 340px" value="<?= get_option( "impressum_manager_chamber" ) ?>"><br>
				<small><?= __( "Kammer, der Sie angehören", SLUG ) ?></small>
				<br>
			</td>
		<tr valign="top">
			<th scope="row"><input type="checkbox" id="allowness"
			                                   name="impressum_manager_allowness" <?= checked( "on", get_option( "impressum_manager_allowness" ), false ) ?>><label
					for="allowness"><b><?= __( "Behördliche Zuslassung", SLUG ) ?></b></label></th>
			<td id="allowness_textarea">
                        <textarea name="impressum_manager_responsible_chamber"
                                  style="width: 340px; height: 225px;"><?= get_option( "impressum_manager_responsible_chamber" ) ?></textarea><br>
				<small><?= __( "Zuständige Aufsichtsbehörde", SLUG ) ?></small>
			</td>
		</tr>
	</table>
	<table class="form-table">
		<tr valign="top">
			<th scope="row" ><b><?= __( "Bildquellen", SLUG ) ?></b></th>
			<td >
                        <textarea name="impressum_manager_image_source"
                                  style="width: 340px; height: 225px;"><?= get_option( "impressum_manager_image_source" ) ?></textarea><br>
				<small><?= __( "z.B. Max Mustermann, http://www.fotolia.com", SLUG ) ?></small>
			</td>
		</tr>

		<tr valign="top">
			<th scope="row" ><input type="checkbox" id="press_content"
			                                   name="impressum_manager_press_content" <?= checked( "on", get_option( "impressum_manager_press_content" ), false ) ?>
				<label
					for="press_content"><b><?= __( "journalistisch-redaktionelle Inhalte", SLUG ) ?></b></label>
			</th>
			<td id="press_content_textarea">
                        <textarea name="impressum_manager_responsible_persons"
                                  style="width: 340px; height: 225px;"><?= get_option( "impressum_manager_responsible_persons" ) ?></textarea><br>
				<small><?= __( "Vor-, Nachname inkl. Anschrift angeben. Bei mehreren Verantwortlichen die
                                        Verantwortungen entsprechend mit angeben.", SLUG ) ?>
				</small>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td>
				<a href="options-general.php?page=<?= SLUG ?>&view=tutorial&skip_start_temp=true&step=1">
					<input type="button" class="button button-secondary"
					       value="<?= __( "Schritt zurück", SLUG ) ?>"
					       style="margin-top: 5px">
				</a>
			</td>
			<td>
				<?= submit_button( __( "Nächster Schritt", SLUG ) ) ?>
			</td>
		</tr>
	</table>
</form>