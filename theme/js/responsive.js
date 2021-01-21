(function($) {

	'use strict';

	var init = function() {
        $( window ).resize(function(){
            initResponsivePosition();
        });
        $( window ).resize();
	};
    
    var initDynamicHeight = function(){
        if($('.page-expertise-n2').length){
        }
    };
    
    var initResponsivePosition = function(){
        if (window.matchMedia("(max-width: 767px)").matches) {
            $('#contain-menuexpert').insertBefore($('.headerExpert'));
            $('.mainfooter .blog').insertBefore($('.mainfooter .social-network'));
            $('.clients .clients__link').insertAfter($('.clients .clients__container__logos'));
            
//            if($('body.page-template-template-agence').length){
//                $('.adn__part-1__content').removeClass('animate ciFadeLeft animated');
//                $('.adn__part-1__content').removeClass('ciFadeLeft');
//                $('.adn__part-1__content').removeClass('animated');
//            }
        }
        else{
            $('.headerExpert').insertBefore($('#contain-menuexpert'));
            $('.mainfooter .social-network').insertBefore($('.mainfooter .blog'));
            $('.clients .clients__link').insertAfter($('.clients .innerText'));
            
//            if($('body.page-template-template-agence').length){
//                $('.adn__part-1__content').addClass('animate ciFadeLeft');
//            }
        }
    };

	$(document).ready(function() {
		init();
	});

})(jQuery);
