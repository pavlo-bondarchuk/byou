document.addEventListener('DOMContentLoaded', function (event) {
	'use strict';
	var $ = jQuery;
	if (!$('body').hasClass('wp-admin')) {
		var slider = new Swiper('.slider__container', {
			lazy: true,
			loop: true,
			allowTouchMove: true,
			autoplay: {
				delay: 2000,
			},
			navigation: {
				nextEl: '.sliderNext',
				prevEl: '.sliderPrev'
			},
			breakpoints: {
				320: {
					slidesPerView: 1.25,
					spaceBetween: 5
				},
				480: {
					slidesPerView: 1.25,
					spaceBetween: 5
				},
				640: {
					slidesPerView: 1,
					spaceBetween: 20
				}
			}
		});
	}
});