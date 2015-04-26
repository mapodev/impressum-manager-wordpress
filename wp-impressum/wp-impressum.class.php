<?php


class WPImpressum
{

    function __construct()
    {
        $page = get_page_by_title("Impressum");
        error_log(var_export($page, true));
        if (empty($page)) {
            $page_id = wp_insert_post(
                array(
                    'comment_status' => 'closed',
                    'ping_status' => 'closed',
                    'post_author' => 1,
                    'post_name' => WPImpressumConfig::getInstance()->wpi_getSlug(),
                    'post_title' => "Impressum",
                    'post_status' => 'publish',
                    'post_type' => 'page'
                )
            );

        }

    }
}
