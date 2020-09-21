;(function($){
	"use strict";
	
	$(document).ready(function() {
		$('.popup-link').magnificPopup({
			type: 'image',
			closeOnContentClick: true,
			//mainClass: 'zooming',
			zoom: {
				enabled: true,
				duration: 300
			},
			image: {
				titleSrc: function(item) {
					return $('h1.title').text();
				}
			},
		});
	});

})(jQuery);