document.addEventListener('DOMContentLoaded', function (event) {
	'use strict';
	var $ = jQuery;
	if (!$('body').hasClass('wp-admin')) {

		const breakpoint = window.matchMedia('(min-width:31.25em)');
		let findTreatmentSwiper;
		const breakpointChecker = function () {
			if (breakpoint.matches === true) {
				if (findTreatmentSwiper !== undefined) findTreatmentSwiper.destroy(true, true);
				return;
			} else if (breakpoint.matches === false) {
				return findTreatmentEnableSwiper();
			}
		};

		const findTreatmentEnableSwiper = function () {
			findTreatmentSwiper = new Swiper('.wrapper__treatments', {
				a11y: true,
				keyboardControl: true,
				grabCursor: true,
				pagination: {
					el: '.wrapper__treatments-pagination',
					clickable: true,
					bulletClass: 'bullet',
					bulletActiveClass: 'bullet-active',
				},
				slidesPerView: 1,
				spaceBetween: 25
			});
		};

		breakpoint.addListener(breakpointChecker);
		breakpointChecker();

	}
});