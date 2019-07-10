require(['jquery'],function($){
    "use strict";

    jQuery("#signup-form").on("submit", function(){
        jQuery.ajax({
            showLoader: true,
            url: '/signup/save',
            data: {
                'signup-form': $('#signup-form').serialize()
            },
            type: "POST",
            dataType: 'json'
        }).done(function (data) {
            console.log("saved");
        });

        return;
    })


});