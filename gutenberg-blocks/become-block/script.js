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
			mySwiper = new Swiper('.become-block .item__slider', {
				loop: true,
				a11y: true,
				keyboardControl: true,
				grabCursor: true,
				pagination: {
					el: '.item__slider-pagination',
					clickable: true,
					bulletClass: 'bullet',
					bulletActiveClass: 'bullet-active',
				},
				slidesPerView: 1,
				spaceBetween: 0,
			});
		};

		breakpoint.addListener(breakpointChecker);
		breakpointChecker();

	}
});
