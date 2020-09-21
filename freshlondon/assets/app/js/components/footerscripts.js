/**
 * Theme app JS file.
 * Contains global JS code not specific to any componenet
 *
 * @version 1.0
 * @since 1.0
 **/
jQuery(function ($) {
	/**
	 * Event - Doc ready
	 **/
	$(window).on('load', function () {
		'use strict';

		// Enable CSS-based JavaScript
		$('html').removeClass('no-js').addClass('yes-js');

		console.log('footer scripts finished');
	});


});