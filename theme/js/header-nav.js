(function($) {

	'use strict';

	var init = function() {
		initHeaderNav();
	};

	var initHeaderNav = function() {
		$('.expertlink').on('click', function(e){
            e.preventDefault();
            $('#popup-expertise').slideDown(200);
        });
        
        $('.closeMenu').on('click', function(e){
            e.preventDefault();
            $('#popup-expertise').slideUp(200);
        });
	};

	$(document).ready(function() {
		init();
	});

})(jQuery);
