var ComponentsSelect2 = function() {

    var handleDemo = function() {

        // Set the "bootstrap" theme as the default theme for all Select2
        // widgets.
        //
        // @see https://github.com/select2/select2/issues/2927
        $.fn.select2.defaults.set("theme", "bootstrap");

        var placeholder = "Select a State";

        $(".select2, .select2-multiple").select2({
            placeholder: placeholder,
            width: null
        });

        $(".select2-allow-clear").select2({
            allowClear: true,
            placeholder: placeholder,
            width: null
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        // @see https://select2.github.io/examples.html#data-ajax
        function formatRepoDisease(repo) {
            if (repo.loading) return repo.text;
            var markup = "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__title'>" + repo.name + "</div></div>";

            return markup;
        }

        function formatRepoSelectionDisease(repo) {
            return repo.name || repo.text;
        }

        $(".js-data-disease-ajax").select2({
            width: "off",
            ajax: {
                url: "/backend/Disease/search",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, page) {
                    // parse the results into the format expected by Select2.
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data
                    return {
                        results: data.items
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: formatRepoDisease,
            templateSelection: formatRepoSelectionDisease
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        function formatRepoMedicine(repo) {
            if (repo.loading) return repo.text;
            var markup = "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__title'>" + repo.name + "</div></div>";

            return markup;
        }

        function formatRepoSelectionMedicine(repo) {
            return repo.name || repo.text;
        }

        $(".js-data-medicine-ajax").select2({
            width: "off",
            ajax: {
                url: "/backend/Disease/search",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, page) {
                    // parse the results into the format expected by Select2.
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data
                    return {
                        results: data.items
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: formatRepoMedicine,
            templateSelection: formatRepoSelectionMedicine
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        $("button[data-select2-open]").click(function() {
            $("#" + $(this).data("select2-open")).select2("open");
        });

        $(":checkbox").on("click", function() {
            $(this).parent().nextAll("select").prop("disabled", !this.checked);
        });

        // copy Bootstrap validation states to Select2 dropdown
        //
        // add .has-waring, .has-error, .has-succes to the Select2 dropdown
        // (was #select2-drop in Select2 v3.x, in Select2 v4 can be selected via
        // body > .select2-container) if _any_ of the opened Select2's parents
        // has one of these forementioned classes (YUCK! ;-))
        $(".select2, .select2-multiple, .select2-allow-clear, .js-data-example-ajax").on("select2:open", function() {
            if ($(this).parents("[class*='has-']").length) {
                var classNames = $(this).parents("[class*='has-']")[0].className.split(/\s+/);

                for (var i = 0; i < classNames.length; ++i) {
                    if (classNames[i].match("has-")) {
                        $("body > .select2-container").addClass(classNames[i]);
                    }
                }
            }
        });

        $(".js-btn-set-scaling-classes").on("click", function() {
            $("#select2-multiple-input-sm, #select2-single-input-sm").next(".select2-container--bootstrap").addClass("input-sm");
            $("#select2-multiple-input-lg, #select2-single-input-lg").next(".select2-container--bootstrap").addClass("input-lg");
            $(this).removeClass("btn-primary btn-outline").prop("disabled", true);
        });
    }

    return {
        //main function to initiate the module
        init: function() {
            handleDemo();
        }
    };

}();

if (App.isAngularJsApp() === false) {
    jQuery(document).ready(function() {
        ComponentsSelect2.init();
    });
}