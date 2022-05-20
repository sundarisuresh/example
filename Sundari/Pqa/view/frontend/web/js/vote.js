define([
    "jquery",
    "jquery/ui"
], function ($) {
    "use strict";

    function main(config, element) {
        var $element = $(element);
        var AjaxUrl = config.AjaxUrl;
        $(document).ready(function () {
            $(".vote").click(function () {
                var $type = $(this).attr('type');
                var $qid = $(this).attr('questionid');
                $.ajax({
                    url: AjaxUrl,
                    type: "POST",
                    data: {que_id: $qid, type: $type},
                }).done(function (data) {
                    $('#ajaxresponse').html(data.output);
                    return true;
                });
            });
        });
    };
    return main;
});
