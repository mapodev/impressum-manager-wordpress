<script>
	(function ($) {
		$(document).ready(function () {
			$("#delete_options").click(function () {
				var data = {
					'action': 'impressum_manager_delete_options',
					'delete': true
				};

				$.post(ajaxurl, data, function (response) {
				});
			});
		});
	}(jQuery));
</script>
<div class="wrap">
	<?php if ( $_GET['view'] != "config" ) {
		?>
		<h2 class="logo"><?= __( 'Impressum Manager', SLUG ) ?></h2>
	<?php
	}
	?>

	<h2 class="nav-tab-wrapper" id="impressum-manager-tabs">
		<a class="nav-tab nav-tab-active" id="general-tab"
		   href="#general-tab-j"><?= __( "General", SLUG ) ?></a>
		<a class="nav-tab" id="settings-tab"
		   href="#settings-tab-j"><?= __( "Kontaktdaten", SLUG ) ?></a>
		<a class="nav-tab" id="fields-tab"
		   href="#fields-tab-j"><?= __( "Impressum Fields", SLUG ) ?></a>
		<a class="nav-tab" id="import-tab"
		   href="#import-tab-j"><?= __( "Import" ) ?></a>
	</h2>
	<br>

	<form action="<?php Impressum_Manager_Admin::get_page_url() ?>">
		<input type="hidden" name="page" value="<?= SLUG ?>">
		<input type="hidden" name="view" value="main">
		<input class="button button-secondary" type="submit" value="<?= _e( 'Zur Vorschau' ) ?>">
	</form>

	<div class="general-tab tab">
		<?php include( plugin_dir_path( __FILE__ ) . "/tabs/impressum-manager-general-tab.php" ) ?>
	</div>
	<div class="settings-tab tab">
		<?php include( plugin_dir_path( __FILE__ ) . "/tabs/impressum-manager-settings-tab.php" ) ?>
	</div>
	<div class="fields-tab tab">
		<?php include( plugin_dir_path( __FILE__ ) . "/tabs/impressum-manager-fields-tab.php" ) ?>
	</div>
	<div class="import-tab tab">
		<?php include( plugin_dir_path( __FILE__ ) . "/tabs/impressum-manager-import-tab.php" ) ?>
	</div>
</div>