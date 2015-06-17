<!--<p>This sentence needs more of an explanation for the user. <span class="question">?</span></p>-->
<form action="<?= Impressum_Manager_Admin::get_page_url() ?>&view=tutorial&skip_start_temp=true&step=2" method="post">
	<table class="form-table">

		<?php include(plugin_dir_path(__FILE__) . "../settingforms/forms-kind-of-person.php"); ?>

		<tr>
			<td>
				<?= submit_button( __( "Nächster Schritt", SLUG ) ) ?>
			</td>
		</tr>
	</table>
</form>