<?php
/*

http://www.davidjrush.com/blog/2011/12/simple-jquery-tooltip/

Zu den Einstellungen <großer zwischenraum> schritt zurück <zwischenraum> nächster schritt

*/

?>

<h2 class="logo">'.esc_html__('Impressum Manager', SLUG).'</h2>
<div class="impressum-manager-start-wrap">

	<p><?php esc_html_e( 'Willkommen bei Impressum-Manager. Dieses plugin hilft dir deine Webseite(n) rechtsicher zu machen ...', SLUG ); ?></p>

	<p><?php esc_html_e( 'HÄCKCHENTEXT', SLUG ); ?></p>

	<div class="box primary">
		<div>
			<strong><?php esc_html_e( 'In 4 Schritten zur rechtssicheren Webseite', SLUG ); ?></strong><br>

			<p><?php esc_html_e( 'Mit dem Impressum-Manager kannst du deine Webseite schnell rechtssicher machen, indem du ...', SLUG ); ?></p>
		</div>
		<form action="<?php Impressum_Manager_Admin::get_page_url() ?>" class="right">
			<input type="hidden" name="page" value="<?= SLUG ?>">
			<input type="hidden" name="view" value="tutorial"/>
			<input type="hidden" name="step" value="1"/>
			<input type="hidden" name="skip_start_temp" value="true">
			<input class="button button-primary" type="submit"
			       value="<?= _e( 'Impressum konfigurieren' ) ?>">
		</form>
	</div>
	<div class="box secondary">
		<div>
			<strong><?php esc_html_e( 'Vorhandenes Impressum benutzen', SLUG ); ?></strong><br>

			<p><?php esc_html_e( 'Wenn du schon ein Impressum besitzt, kannst du es hier einbinden.', SLUG ); ?></p>
		</div>
		<form action="<?php Impressum_Manager_Admin::get_page_url() ?>" class="right">
			<input type="hidden" name="page" value="<?= SLUG ?>">
			<input type="hidden" name="view" value="config">
			<input type="hidden" name="skip_start" value="true">
			<input type="hidden" name="tut_finished" value="true">
			<input class="button button-primary" type="submit" value="<?= _e( 'Impressum einbinden' ) ?>">
		</form>
	</div>
	<div class="box primary">
		<div>
			<strong><?php esc_html_e( 'Später Konfigurieren', SLUG ); ?></strong><br>

			<p><?php esc_html_e( 'Das Impressum lässt sich auch jederzeit später konfigureren. Wenn du erst die Einstellungen sehen möchstest, klicke hier auf den Button.', SLUG ); ?></p>
		</div>
		<form action="<?php Impressum_Manager_Admin::get_page_url() ?>" class="right">
			<input type="hidden" name="page" value="<?= SLUG ?>">
			<input type="hidden" name="view" value="config">
			<input type="hidden" name="skip_start" value="true">
			<input type="hidden" name="tut_finished" value="true">
			<input class="button button-primary" type="submit" value="<?= _e( 'Zu den Einstellungen' ) ?>">
		</form>
	</div>

</div>