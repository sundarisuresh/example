define([
    "jquery",
    "jquery/ui"
], function ($) {
    "use strict";

    function main(config, element) {
        var $element = $(element);
        var AjaxUrl = config.AjaxUrl;
        // console.log('dddd');
        console.log(AjaxUrl);
        // var dataForm = $('#contact-form');
        // dataForm.mage('validation', {});

        $(document).on('click', '.vote', function (event) {
            var $questionid = $(this).attr('questionid');
            var $vote = $(this).attr('vote');
            var $count = $(this).attr('count');
            var $clickelement = $(this);

            console.log('ffff');


            var param = { questionid: $questionid, vote: $vote, count: $count };
            // alert(param);

            $.ajax({
                // showLoader: true,
                url: AjaxUrl,
                data: param,
                type: "POST"
            }).done(function (data) {
                $('.voteresult').html(data.result);
                // $('.count').html(data.vote);
                console.log($clickelement);
                var $target = $clickelement.siblings( ".count" ).eq(1);
                console.log($target);
                $target.html(data.vote)

                // $('.voteresult').html(data.result);
                // $('.note').css('color', 'red');
                // document.getElementById("contact-form").reset();
                return true;
            });



        });
    };
    return main;


});