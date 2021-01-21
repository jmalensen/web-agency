(function($) {

	'use strict';

	var init = function() {
        $( window ).resize(function(){
            initPrestation();
        });
        $( window ).resize();
        initSeeMore();
	};
    
    var initSeeMore = function(){
        $('.seemore').on('click', function(e){
            e.preventDefault();
            $('.short-text').fadeOut(100);
            
            $('.full-text').slideDown(200);
        });
    };
        
    var initPrestation = function(){
        if (window.matchMedia("(max-width: 480px)").matches) {
        }
        else{
            $('.introPresta').attr('style', '');
            $('.full-text').attr('style', '');
            $('.short-text').attr('style', '');
        }
    };

	$(document).ready(function() {
		init();
	});

})(jQuery);
