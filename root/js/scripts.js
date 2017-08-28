// PGW Slider
$(document).ready(function() {
    $('.pgwSlider').pgwSlider({

        maxHeight: 300
    });
});

// Masonry
$(document).ready(function(){

    $('#home-gallery').masonry({
        // options
        itemSelector: '.grid-item',
        isAnimated: true,
        animationOptions: {
            duration: 1000,
            easing: 'linear',
            queue: false

        }
    });

});


// Google Maps API
/*
var map;
function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: -14.397, lng: 150.644},
		zoom: 1
	});
}
*/

// Gallery Shuffler (Homepage)
$(document).ready(function () {

    var skip = [];
    var i,
        x;

    setInterval(function(){
        function randomNum(){

            //Math.floor(Math.random() * (max - min + 1)) + min;
            var x = Math.floor(Math.random() * (6 - 1 + 1)) + 1;; // Which image to change (1-6)
            var i = Math.floor(Math.random() * (20 - 1 + 1)) + 1;; // Change to which image (Out of 20 for now)

        }


        // Change attr w/ fades
        var src = $(this).attr("src");
        $("#img"+x).fadeOut(function() {
            $(this).attr("src", "./images/Gallery/thumbnails/"+i+".jpg").fadeIn();
        });

    },6000);
});

// Login Modal Ajax
$(document).ready(function(){

    // prevents form submission
    $( 'input[name="loginUser"]' ).click( function( e ){
        e.preventDefault();

        // login using ajax instead
        var formData = {};
        formData.userName = $('#login-username').val();
        formData.password = $('#login-password').val();

        // calls 'login' in router.inc.php
        $.post( 'index.php?action=login', formData, function( response ){

            if( response.status == 'success' ){

                location.reload();

            } else {

                var errors = '';

                if( response.errors.userName ){
                    errors +=  response.errors.userName;
                }

                if( response.errors.password ){
                    errors +=  response.errors.password;
                }


                $( '#login-error' ).html( errors );
            }
        } , 'json' );
    });
});