<?php
/*

http://www.davidjrush.com/blog/2011/12/simple-jquery-tooltip/

Zu den Einstellungen <großer zwischenraum> schritt zurück <zwischenraum> nächster schritt

*/

?>

<script>
    (function ($) {
        $(document).ready(function () {
            $("#configure_impressum, #setup_existing, #skip_tutorial").click(function (event) {
                if (false === $("#willing_to").prop("checked")) {
                    event.preventDefault();
                    $("#willing_to").css("border", "2px #f00 solid");
                    $("#willing_text").css("color", "#f00");
                } else {
                    $("#willing_to").css("border", "inherit");
                }
            });

            $("#willing_to").click(function () {
                $(this).css("border", "inherit");
                $(this).parent().css("color", "inherit");
            });
        });
    }(jQuery));
</script>

<h2 class="logo"><?= __('Impressum Manager', SLUG) ?></h2>
<div class="impressum-manager-start-wrap">

    <h3><?= __('Willkommen bei Impressum-Manager. Dieses Plugin hilft dir deine Webseite(n) rechtsicher zu machen ...', SLUG); ?></h3>

    <div class="box primary">
        <strong>Bestätigung des Warnhinweises</strong><br>

        <p><?= __('Ich weiß, dass ich die Nutzung der Impressum, Datenschutz und Haftungsauschluss Inhalte ' .
                'auf eigene Gefahr verwende. ' .
                'Mir ist bewusst, dass Impressum Manager keine Gewährleistung auf Schadenersatz anbietet,' .
                ' sofern rechtliche Schäden bzgl. meiner Webseite durch die Nutzung von dem Impressum Manager Wordpress Plugin entstanden sind. ', SLUG); ?></p>

        <p id="willing_text"><input type="checkbox" name="willing_to"
                                    id="willing_to"> <?= __("Ich bestätige hiermit, dass ich das Plugin auf eigene Gefahr nutze.") ?>
        </p>
    </div>

    <div class="box primary">
        <div>
            <strong><?= __('In 4 Schritten zur rechtssicheren Webseite', SLUG); ?></strong><br>

            <p><?= __('Mit dem Impressum-Manager kannst du deine Webseite schnell rechtssicher machen, indem du ...', SLUG); ?></p>
        </div>
        <form action="<?php Impressum_Manager_Admin::get_page_url() ?>" class="right">
            <input type="hidden" name="page" value="<?= SLUG ?>">
            <input type="hidden" name="view" value="tutorial"/>
            <input type="hidden" name="step" value="1"/>
            <input type="hidden" name="skip_start_temp" value="true">
            <input class="button button-primary" type="submit" id="configure_impressum"
                   value="<?= _e('Impressum konfigurieren') ?>">
        </form>
    </div>
    <div class="box secondary">
        <div>
            <strong><?= __('Später Konfigurieren', SLUG); ?></strong><br>

            <p><?= __('Das Impressum lässt sich auch jederzeit später konfigureren. Wenn du erst die Einstellungen sehen möchstest, klicke hier auf den Button.', SLUG); ?></p>
        </div>
        <form action="<?php Impressum_Manager_Admin::get_page_url() ?>" class="right">
            <input type="hidden" name="page" value="<?= SLUG ?>">
            <input type="hidden" name="view" value="config">
            <input type="hidden" name="skip_start" value="true">
            <input type="hidden" name="tut_finished" value="true">
            <input class="button button-primary" type="submit" value="<?= _e('Zu den Einstellungen') ?>"
                   id="skip_tutorial">
        </form>
    </div>

</div>
