<?php

class WPImpressumConfig
{

    private $version;
    private $slug;

    private static $instance = null;

    public function __construct()
    {
        $this->version = "0.0.1";
        $this->slug = "wp-impressum-plugin";

        if (is_admin()) {
            add_action('admin_menu', array($this, 'addmenu'));
        }
    }

    public function addmenu()
    {
        add_options_page("WP Impressum", 'WP Impressum', 'manage_options', $this->getSlug(), array($this, 'show'), 99.5);
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new WPImpressumConfig();
        }
        return self::$instance;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    public function show()
    {
?>
<div class="wrap">
    <h2>WP Impressum</h2>

    <h3><?php _e('HTML Options','autoptimize'); ?></h3>
    <table class="form-table">
        <tr valign="top">
            <th scope="row"><?php _e('Optimize HTML Code?','autoptimize'); ?></th>
            <td><input type="checkbox" id="autoptimize_html" name="autoptimize_html" <?php echo get_option('autoptimize_html')?'checked="checked" ':''; ?>/></td>
        </tr>
        <tr class="html_sub" valign="top">
            <th scope="row"><?php _e('Keep HTML comments?','autoptimize'); ?></th>
            <td><label for="autoptimize_html_keepcomments"><input type="checkbox" name="autoptimize_html_keepcomments" <?php echo get_option('autoptimize_html_keepcomments')?'checked="checked" ':''; ?>/>
                    <?php _e('Enable this if you want HTML comments to remain in the page, needed for e.g. AdSense to function properly.','autoptimize'); ?></label></td>
        </tr>
    </table>
</div>
<?php
    }
}
