document.addEventListener('DOMContentLoaded', function (event) {
	'use strict';
	var $ = jQuery;
	if (!$('body').hasClass('wp-admin')) {
		const breakpoint = window.matchMedia('(min-width:31.25em)');
		let treatmentProcessSwiper;
		const breakpointChecker = function () {
			if (breakpoint.matches === true) {
				if (treatmentProcessSwiper !== undefined) treatmentProcessSwiper.destroy(true, true);
				return;
			} else if (breakpoint.matches === false) {
				return treatmentProcessEnableSwiper();
			}
		};

		const treatmentProcessEnableSwiper = function () {
			treatmentProcessSwiper = new Swiper('.process__slider', {
				loop: true,
				slidesPerView: 1,
				spaceBetween: 70,
				centeredSlides: true,
				a11y: true,
				keyboardControl: true,
				grabCursor: true,
				pagination: {
					el: '.treatmentProcessSlider-pagination',
					clickable: true,
					type: 'bullets',
					bulletClass: 'bullet',
					bulletActiveClass: 'bullet-active',
				},
			});
		};

		breakpoint.addListener(breakpointChecker);
		breakpointChecker();

	}
});
