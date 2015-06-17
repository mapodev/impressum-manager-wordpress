(function ($) {
    $(document).ready(function () {

        var hash = window.location.hash.substring(1);

        $(".nav-tab").click(function () {
            triggerTab(this, $(this).attr("id"));
            console.log("test");
        });

        if (hash.length) {
            hash = hash.replace("-j","");
            triggerTab($("#" + hash), hash);
        } else {
            triggerTab($("#settings-tab"), "settings-tab");
        }

        function triggerTab(o, name) {
            $(".tab").hide();
            $(".nav-tab").removeClass("nav-tab-active");
            $(o).addClass("nav-tab-active");
            $("." + name).addClass("nav-tab-active").show();
        }

        $("span.question").hover(function () {
            $(this).append('<div class="tooltip"><p>This is a tooltip. It is typically used to explain something to a user without taking up space on the page.</p></div>');
        }, function () {
            $("div.tooltip").remove();
        });
    });
}(jQuery));
