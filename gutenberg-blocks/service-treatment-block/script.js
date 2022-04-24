document.addEventListener('DOMContentLoaded', function (event) {
	'use strict';
	var $ = jQuery;
	if (!$('body').hasClass('wp-admin')) {

		const breakpoint = window.matchMedia('(min-width:31.25em)');
		let serviceTreatmentSwiper;
		const breakpointChecker = function () {
			if (breakpoint.matches === true) {
				if (serviceTreatmentSwiper !== undefined) serviceTreatmentSwiper.destroy(true, true);
				return;
			} else if (breakpoint.matches === false) {
				return serviceTreatmentEnableSwiper();
			}
		};

		const serviceTreatmentEnableSwiper = function () {
			serviceTreatmentSwiper = new Swiper('.content__wrapper', {
				a11y: true,
				keyboardControl: true,
				grabCursor: true,
				pagination: {
					el: '.content__wrapper-pagination',
					clickable: true,
					bulletClass: 'bullet',
					bulletActiveClass: 'bullet-active',
				},
				slidesPerView: 2,
				slidesPerColumn: 2,
				slidesPerGroup: 2,
				spaceBetween: 50,
				slidesPerColumnFill: 'row',
			});
		};

		breakpoint.addListener(breakpointChecker);
		breakpointChecker();

	}
});
