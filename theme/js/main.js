(function($) {

	'use strict';

	var init = function() {
		// Display number of recent posts in menu
		var count = $('#recent-posts-count').data('count');
		$('footer.main .links .posts-counter').append('<span class="posts-counter-data">' + count +'</span>');
	};



	$(document).ready(function() {
		init();
	});

})(jQuery);
