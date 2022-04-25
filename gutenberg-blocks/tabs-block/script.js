document.addEventListener('DOMContentLoaded', function (event) {
	'use strict';
	var $ = jQuery;
	if (!$('body').hasClass('wp-admin')) {
		$('.tab__wrapper').tabslet({
			active: 1,
			animation: true
		});
	}
});
