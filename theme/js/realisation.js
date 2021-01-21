(function($) {

    'use strict';

    var init = function() {
        initCarousel();
    };

    var initCarousel = function() {

        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            navText: ['',''],
//            autoHeight: true,
            autoplay: false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });
    };

    $(document).ready(function() {
        init();
    });

})(jQuery);
