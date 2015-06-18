<?php

// workaround for visual tab not working, when loading on text editor
add_filter('wp_default_editor', create_function('', 'return "tinymce";'));

?>

<script>
    (function ($) {
        $(document).ready(function () {

            tinyMCE.init({
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
                    tinymce.editors[0].setContent(response);
                });
            });
        });
    }(jQuery));
</script>

<?php

global $wpdb;

if (!empty($_POST) && isset($_POST['submit'])) {
    $val = html_entity_decode(nl2br(esc_attr(@$_POST['editor'])));
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
	<?php wp_editor("", "editor"); ?>

    <? submit_button(__("Update")) ?>
</form>
