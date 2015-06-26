<?php if ( ! shortcode_exists( 'impressum_manager' ) ) {
	require_once IMPRESSUM_MANAGER_PLUGIN_DIR . "class.impressum-manager.php";
	add_shortcode( "impressum_manager", array( 'Impressum_Manager', 'content_shortcode' ) );
}

Impressum_Manager_Admin::save_option( "impressum_manager_notice", "dismissed" );

if ( @$_GET['tut_finished'] == true && array_key_exists( "submit", $_REQUEST ) ) {
	Impressum_Manager_Admin::save_option( "impressum_manager_noindex", @$_POST['impressum_manager_noindex'] );
	Impressum_Manager_Admin::save_option( "impressum_manager_show_email_as_image", @$_POST['impressum_manager_show_email_as_image'] );
}

$content = do_shortcode( '[impressum_manager]' );

?>





<div class="wrap">
	<h2 class="logo"><?= __( 'Impressum Manager', SLUG ) ?></h2>

	<?php
	if ( empty( $content ) ) {
		?>
		<div class="nbox">
			<div class="box-empty-outer">
				<div class="box-empty-middle">
					<div class="box-empty-inner">
						<p>

						<form action=<?php Impressum_Manager_Admin::get_page_url() ?>>
							<input type="hidden" name="page" value="<?= SLUG ?>">
							<input type="hidden" name="view" value="tutorial"/>
							<input type="hidden" name="step" value="1"/>
							<input class="button button-primary" type="submit" id="configure_impressum"
							       value="<?= _e( 'Impressum generieren' ) ?>">
						</form>
						</p>
						<?= __( 'oder', SLUG ) ?>
						<p>

						<form action=<?php Impressum_Manager_Admin::get_page_url() ?>>
							<input type="hidden" name="page" value="<?= SLUG ?>">
							<input type="hidden" name="view" value="tutorial"/>
							<input type="hidden" name="step" value="1"/>
							<input class="button button-primary" type="submit" id="configure_impressum"
							       value="<?= _e( 'Impressum importieren' ) ?>">
						</form>
						</p>
					</div>
				</div>
			</div>
		</div>
	<?php
	} else {
		?>
		<div class="nbox">
			<div class="box-preview">
				<div class="box-preview-header">
					<h3><?= __( 'Wähle einen shortcode aus und schau dir die Vorschau an! ', SLUG );?></h3><br><br>
					<?= __( 'Shortcode: ', SLUG ) ?>
					<select name="impressum_key" id="impressum_change">
						<!-- ... -->
					</select>
				</div>
				<div class="box-preview-buttons">
					<form action="<?php Impressum_Manager_Admin::get_page_url() ?>" style="display:inline">
						<input type="hidden" name="page" value="<?= SLUG ?>">
						<input type="hidden" name="view" value="config">
						<input class="button button-primary" type="submit" value="<?= _e( 'Konfigurieren' ) ?>">
					</form>
				</div>
				<div class="box-preview-content" id="impressum-preview-content">
					<hr>
					<?php echo $content ?>
				</div>
			</div>
		</div>
	<?php
	}
	?>
</div>