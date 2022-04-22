document.addEventListener('DOMContentLoaded', function (event) {
	'use strict';
	var $ = jQuery;
	if (!$('body').hasClass('wp-admin')) {
		const breakpoint = window.matchMedia('(min-width:31.25em)');
		let mySwiper;
		const breakpointChecker = function () {
			if (breakpoint.matches === true) {
				if (mySwiper !== undefined) mySwiper.destroy(true, true);
				return;
			} else if (breakpoint.matches === false) {
				return enableSwiper();
			}
		};

		const enableSwiper = function () {
			mySwiper = new Swiper('.why__us .items', {
				loop: true,
				slidesPerView: 1,
				centeredSlides: true,
				a11y: true,
				keyboardControl: true,
				grabCursor: true,
				pagination: {
					el: '.swiper-pagination',
					clickable: true,
				},
			});
		};

		breakpoint.addListener(breakpointChecker);
		breakpointChecker();

	}
});
