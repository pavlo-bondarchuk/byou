let imageCompareViewers = document.querySelectorAll(".image-compare");

let configs = [
	{
		controlColor: "#FFFFFF",
	},
	{
		controlColor: "#FFFFFF",
	}
];

imageCompareViewers.forEach((element, i) => {
	new ImageCompare(element, configs[i]).mount();
});

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
			mySwiper = new Swiper('.services__wrapper', {
				loop: true,
				slidesPerView: 1,
				centeredSlides: true,
				a11y: true,
				keyboardControl: true,
				grabCursor: false,
				allowTouchMove: false,
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
