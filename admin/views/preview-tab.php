<?php
if(!shortcode_exists('impressum_manager')) {
    require_once IMPRESSUM_MANAGER_PLUGIN_DIR . "class.impressum-manager.php";
    add_shortcode("impressum_manager", array('Impressum_Manager', 'content_shortcode'));
}

$im = new Impressum();
echo $im->get_whole_impressum();

?>
