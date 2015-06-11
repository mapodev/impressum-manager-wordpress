(function ($) {
    $(document).ready(function () {

        var hash = window.location.hash.substring(1);

        $(".nav-tab").click(function () {
            triggerTab(this, $(this).attr("id"));
            console.log("test");
        });

        if (hash.length) {
            $("#"+hash).click();
        }

        function triggerTab(o, name) {
            $(".tab").hide();
            $(".nav-tab").removeClass("nav-tab-active");
            $(o).addClass("nav-tab-active");
            $("." + name).addClass("nav-tab-active").show();
        }
    });
}(jQuery));
