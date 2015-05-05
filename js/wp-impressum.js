(function ($) {

    $(document).ready(function() {
        $(".manage-impressum").show();
        $(".manage-setting").hide();

        $(".manage-impressum-tab").click(function() {
            $(".manage-impressum").show();
            $(".manage-setting").hide();
        });

        $(".manage-setting-tab").click(function() {
            $(".manage-impressum").hide();
            $(".manage-setting").show();
        });
    });
}(jQuery));
