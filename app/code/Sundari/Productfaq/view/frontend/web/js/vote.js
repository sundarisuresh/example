define([
    "jquery",
    "jquery/ui"
], function ($) {
    "use strict";

    function main(config, element) {
        var $element = $(element);
        var AjaxUrl = config.AjaxUrl;
        var CurrentProduct = config.CurrentProduct;

        $(document).ready(function () {
            $(".vote").click(function () {
                var dataId = $(this).attr("queid");
                var typeId = $(this).attr("type");

                $.ajax({
                    context: '#ajaxresponse',
                    url: AjaxUrl,
                    type: "POST",
                    data: {qid: dataId, type: typeId}
                }).done(function (data) {
                    $('#ajaxresponse').html(data.output);
                    return true;
                });

            });
        });

    };
    return main;
});
