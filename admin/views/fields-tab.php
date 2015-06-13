<?php

// PHP

?>

<script>
    (function ($) {
        $(document).ready(function () {

            tinymce.init({
                mode: "exact",
                elements: "editor",
                theme: "simple"
            });

            $("#impressum_change").change(function () {
                var data = {
                    'action': 'impressum_manager_get_impressum_field',
                    key: $(this).val()
                };

                $.post(ajaxurl, data, function (response) {
                    $("#editor").val(response);
                    setText(response);
                });
            });
        });

        function setText(text) {
            tinymce.editors[0].setContent(text);
        }
    }(jQuery));
</script>

<?php

global $wpdb;

if (!empty($_POST) && isset($_POST['submit'])) {
    $val = html_entity_decode(esc_attr(@$_POST['editor']));
    $key = esc_attr(@$_POST['impressum_key']);
    $lang = esc_attr(@$_POST['lang']);

    $table_name = $wpdb->prefix . "impressum_manager_content";

    $wpdb->update(
        $table_name,
        array(
            'impressum_value' => $val
        ),
        array(
            'lang' => $lang,
            'impressum_key' => $key
        ),
        array('%s'),
        array('%s', '%s')
    );
}

?>

<h3><?= __("Update Impressum Fields") ?></h3>
<form action="options-general.php?page=<?= SLUG ?>#fields-tab-j" method="post">
    <select name="lang">
        <option>DE</option>
    </select>

    <select name="impressum_key" id="impressum_change">
        <?php
        $table_name = $wpdb->prefix . "impressum_manager_content";

        $lang_tags = $wpdb->get_results(
            "SELECT *
	FROM $table_name
	WHERE lang = 'DE'"
        );

        foreach ($lang_tags as $tag) {
            echo "<option value='" . $tag->impressum_key . "''>" . $tag->impressum_key . "</option>";
        }
        ?>
    </select>
    <table>
        <tr>
            <td style="vertical-align: top"><?php wp_editor("", "editor"); ?></td>
            <td style="vertical-align: top;">
                <table>
                    <tr>
                        <td>%%NAME%%</td>
                        <td><?=__("Vollständiger Name")?></td>
                    </tr>
                    <tr>
                        <td>%%STREET%%</td>
                        <td><?=__("Straße & Hausnummer")?></td>
                    </tr>
                    <tr>
                        <td>%%ADDRESSEXTRA%%</td>
                        <td><?=__("Vollständiger Name")?></td>
                    </tr>
                    <tr>
                        <td>%%PLACE%%</td>
                        <td><?=__("Ort")?></td>
                    </tr>
                    <tr>
                        <td>%%ZIP%%</td>
                        <td><?=__("PLZ")?></td>
                    </tr>
                    <tr>
                        <td>%%COUNTRY%%</td>
                        <td><?=__("Land")?></td>
                    </tr>
                    <tr>
                        <td>%%PHONE%%</td>
                        <td><?=__("Telefonnummer (inkl. Vorwahl")?></td>
                    </tr>
                    <tr>
                        <td>%%FAX%%</td>
                        <td><?=__("Faxnummer")?></td>
                    </tr>
                    <tr>
                        <td>%%EMAIL%%</td>
                        <td><?=__("E-Mail Adresse")?></td>
                    </tr>
                    <tr>
                        <td>%%AUTHORISEDPERSON%%</td>
                        <td><?=__("Vertretungsberechtigte Persone(n)")?></td>
                    </tr>
                    <tr>
                        <td>%%VAT%%</td>
                        <td><?=__("Umsatzsteuer ID")?></td>
                    </tr>
                    <tr>
                        <td>%%REGISTER%%</td>
                        <td><?=__("Register")?></td>
                    </tr>
                    <tr>
                        <td>%%REGISTERNUMBER%%</td>
                        <td><?=__("Registernummer")?></td>
                    </tr>
                    <tr>
                        <td>%%REGULATEDPROFESSION%%</td>
                        <td><?=__("Gesetzliche Berufsbezeichnung")?></td>
                    </tr>
                    <tr>
                        <td>%%STATE%%</td>
                        <td><?=__("Staat, in dem die Berufsbezeichnung verliehen wurde")?></td>
                    </tr>
                    <tr>
                        <td>%%STATERULES%%</td>
                        <td><?=__("Berfusrechtliche Regelungen (Bezeichnung)")?></td>
                    </tr>
                    <tr>
                        <td>%%CHAMBER%%</td>
                        <td><?=__("Kammer, der Sie angehören")?></td>
                    </tr>
                    <tr>
                        <td>%%RESPONSIBLECHAMBER%%</td>
                        <td><?=__("Gesetzliche Berufsbezeichnung")?></td>
                    </tr>
                    <tr>
                        <td>%%IMAGESOURCE%%</td>
                        <td><?=__("Bildquellen")?></td>
                    </tr>
                    <tr>
                        <td>%%RESPONSIBLEPERSONS%%</td>
                        <td><?=__("Vor-, Nachname inkl. Anschrift angeben. Bei mehreren Verantwortlichen die Verantwortungen entsprechend mit angeben.")?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <? submit_button(__("Update")) ?>
</form>
