(function($) {

	'use strict';

	var init = function() {
		initButtons();
	};

	var initButtons = function() {
		var buttons = $('.button, button');
		buttons.each(function(){
			if(typeof $(this).data('label') === 'undefined') {
				$(this).attr('data-label', $(this).html());
			}
		});
		
	};

	$(document).ready(function() {
		init();
	});

})(jQuery);