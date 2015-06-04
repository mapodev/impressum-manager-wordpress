(function ($) {
    $(document).ready(function() {
        $(".nav-tab").click(function() {
            triggerTab(this, $(this).attr("id"));
        });

        function triggerTab(o,name) {
            $(".tab").hide();
            $(".nav-tab").removeClass("nav-tab-active");
            $(o).addClass("nav-tab-active");
            $("." + name).addClass("nav-tab-active").show();
        }
    });
}(jQuery));
