(function($) {

	'use strict';

	var init = function() {
        
        $( window ).resize(function(){
            initLogosCustomers('.clients__container__logos');
        });
        
        $( window ).resize();
	};

	var initCarousel = function(selector) {
		var owl = $(selector).owlCarousel({
            items: 1,
            dots: true,
            loop:true,
            dotsEach:true
        });
	};
    
    var initLogosCustomers = function(selector) {
        if (window.matchMedia("(max-width: 479px)").matches) {
            $(selector).addClass('owl-carousel', 'owl-theme');
            $(selector).owlCarousel({
                items: 3,
                startPosition: 2,
                dots: false,
                loop:true,
                autoplay:false,
                autoplayTimeout:7000,
                margin: 0,
                stagePadding: 40
            });
        }
        else{
            $(selector).trigger('destroy.owl.carousel').removeClass('owl-carousel owl-loaded');
            $(selector).find('.owl-stage-outer').children().unwrap();
        }
	};
    
	$(document).ready(function() {
		init();
	});

})(jQuery);