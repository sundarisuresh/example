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
                var $click = $(this);
                $.ajax({
                    url: AjaxUrl,
                    type: "POST",
                    data: {que_id: $qid, type: $type},
                }).done(function (data) {
                    $click.closest('.message').html(data.response);
                    return true;
                });
            });
        });
    };
    return main;
});
