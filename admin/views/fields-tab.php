<?php

// PHP

?>

<script>
    (function ($) {
        $(document).ready(function() {
            $("#impressum_change").change(function () {
                var data = {
                    'action': 'impressum_manager_get_impressum_field',
                    key: $(this).val()
                };

                console.log(data);

                $.post(ajaxurl, data, function(response) {
                    $("#editor").text(response);
                });
            });
        });
    }(jQuery));
</script>

<h3><?= __("Update Impressum Fields") ?></h3>

<select>
    <option>DE</option>
</select>

<select id="impressum_change">
<?php

global $wpdb;
$table_name = $wpdb->prefix . "impressum_manager_content";

$lang_tags = $wpdb->get_results(
    "SELECT *
	FROM $table_name
	WHERE lang = 'DE'"
);

foreach ($lang_tags as $tag) {
    echo "<option value=".$tag->impressum_key.">" .$tag->impressum_key . "</option>";
}
?>
</select>
<table>
    <tr>
        <td><textarea style="min-height: 800px; min-width: 700px;" id="editor"></textarea></td>
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
