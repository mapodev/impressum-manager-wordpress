(function ($) {
    $(document).ready(function () {

        var hash = window.location.hash.substring(1);

        $(".nav-tab").click(function () {
            triggerTab(this, $(this).attr("id"));
        });

        if (hash.length) {
            hash = hash.replace("-j","");
            triggerTab($("#" + hash), hash);
        } else {
            triggerTab($("#general-tab"), "general-tab");
        }

        function triggerTab(o, name) {
            $(".tab").hide();
            $(".nav-tab").removeClass("nav-tab-active");
            $(o).addClass("nav-tab-active");
            $("." + name).addClass("nav-tab-active").show();
        }

        $("#impressum_manager_use_imported_impressum").change(function() {
            if($(this).attr("checked")) {
                $("#general-tab").hide();
                $("#settings-tab").hide();
                // hide tabs
                $(".tab").hide();
                $(".nav-tab").removeClass("nav-tab-active");
                $(".import-tab").show();
                $("#import-tab").addClass("nav-tab-active");
            } else {
                $("#general-tab").show();
                $("#settings-tab").show();
            }
        });

    });
}(jQuery));
