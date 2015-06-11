<?php

// PHP

?>

<script>
    (function ($) {
        $(document).ready(function () {

            tinymce.init({
                mode : "exact",
                elements: "editor",
                theme : "simple"
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

<h3><?= __("Update Impressum Fields") ?></h3>
<form>
    <select name="lang">
        <option>DE</option>
    </select>

    <select name="impressum_key" id="impressum_change">
        <?php

        global $wpdb;
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
        <td><?php wp_editor( "", "editor"); ?></td>
        <td style="vertical-align: top;">
            <table>
                <tr>
                    <td>%%NAME%%</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<? submit_button(__("Update")) ?>
</form>