;(function($){
	"use strict";
	
	/*
	$(window).scroll(function (event) {
		var scroll = $(window).scrollTop();
		$('.maskot .place').css({ marginTop: scroll * -0.25 });
	});
	
	$(window).load(function() {
	    var screenTop = $(document).scrollTop();
        $('.maskot .place').css({ marginTop: screenTop * -0.25 });
	});
	*/
	
	var $window	= $(window),
		$document = $(document);
	var maskotPos = function() {
		var didScroll;
		$window.on( 'scroll', function() {
			didScroll = true;
		});
		var hasScrolled = function() {
			var wScrollCurrent = $window.scrollTop();
			$('.maskot .place').css({ marginTop: wScrollCurrent * -0.3 });
		}
		hasScrolled();
		setInterval(function () {
			if (didScroll) {
				hasScrolled();
				didScroll = false;
			}
		}, 0);
	}
	maskotPos();
	
})(jQuery);