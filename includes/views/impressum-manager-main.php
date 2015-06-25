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


<script>
	function testFunction()
	{
		document.getElementById("impressum-preview-content").innerHTML='';
	}

	function deleteImpressum()
	{

	}
</script>


<script>
	function loadXMLDoc()
	{
		var xmlhttp;
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","ajax_info.txt",true);
		xmlhttp.send();
	}
</script>


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
					<h3><?= __( 'Vorschau des Impressums', SLUG ) ?></h3>
				</div>
				<div class="box-preview-buttons">
					<form action="<?php Impressum_Manager_Admin::get_page_url() ?>" style="display:inline">
						<input type="hidden" name="page" value="<?= SLUG ?>">
						<input type="hidden" name="view" value="config">
						<input class="button button-primary" type="submit" value="<?= _e( 'Konfigurieren' ) ?>">
					</form>
					<button class="button button-primary" type="button" onclick="testFunction()"><?= _e( 'Löschen' ) ?></button>
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