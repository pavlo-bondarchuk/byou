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
			mySwiper = new Swiper('.cost_table__wrapper', {
				slidesPerView: 1,
				slidesPerColumn: 3,
				slidesPerGroup: 3,
				spaceBetween: 0,
				pagination: {
					el: '.cost__pagination',
					type: 'bullets',
					clickable: true,
					bulletActiveClass: 'bullet_active',
					bulletClass: 'bullet',
				},
			});
		};

		breakpoint.addListener(breakpointChecker);
		breakpointChecker();

	}
});
