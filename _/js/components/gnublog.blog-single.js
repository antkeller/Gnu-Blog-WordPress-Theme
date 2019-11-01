/**
 * 1718 GNU Blog WordPress Theme - http://www.gnu.com
 * Author: brian.behrens@mervin.com - http://www.mervin.com
 */

var GNUBLOG = GNUBLOG || {};

GNUBLOG.BlogSingle = function () {
	this.config = {
		totalItems: 0,
		gallerySlider: null,
		gallerySliderNav: null
	};
	this.init();
};
GNUBLOG.BlogSingle.prototype = {
	init: function () {
		var self = this;
		self.checkVideos();
		// check for gallery, init if exists
		if($('gallery')) {
			self.galleryInit();
		}
	},
	checkVideos: function () {
		var self = this;
		// setup responsive video
		$('.post .entry-content').fitVids();
	},
	galleryInit: function () {
		var self, numSlick;
		self = this;
		// check for gallery
		if ($('.gallery')) {
			// determine total items in gallery
			self.config.totalItems = $('.gallery .gallery-item').length;
			// set up gallery slider for thumbnails
			if ($('.gallery')) {
				// set up gallery slider
				numSlick = 0;
				$('.gallery').each(function() {
					numSlick++;
					self.config.gallerySlider = $(this).addClass('gallery-' + numSlick);
					self.config.gallerySlider.slick({
						slidesToShow: 1,
						slidesToScroll: 1,
						lazyLoad: 'ondemand',
						fade: false,
						centerMode: false,
						mobileFirst: true,
						adaptiveHeight: true,
						asNavFor: '.gallery-nav-' + numSlick,
						responsive: [
						{
							breakpoint: 768,
							settings: {
								arrows: true,
								prevArrow: '<button type="button" class="slick-prev"></button>',
								nextArrow: '<button type="button" class="slick-next"></button>'
							}
						},
						{
							breakpoint: 480,
							settings: {
								arrows: false
							}
						}]
					});
				});
				numSlick = 0;
				$('.gallery-nav').each(function() {
					numSlick++;
					self.config.gallerySliderNav = $(this).addClass('gallery-nav-' + numSlick);
					self.config.gallerySliderNav.slick({
						lazyLoad: 'ondemand',
						slidesToScroll: 1,
						slidesToShow: 5,
						variableWidth: true,
						asNavFor: '.gallery-' + numSlick,
						arrows: false,
						centerMode: true,
						centerPadding: '50px',
						mobileFirst: true,
						focusOnSelect: true,
						infinite: false,
						responsive: [
						{
							breakpoint: 768,
							settings: {
								slidesToShow: 3
							}
						},
						{
							breakpoint: 480,
							settings: {
								slidesToShow: 3
							}
						}]
					});
				});
			}
			// assign keyboard events to gallery
			$(document).on('keyup.gallery', function (e) {
				var code, currentIndex, newIndex, slideIndex;
				// get the code
				code = (e.keyCode ? e.keyCode : e.which);
				// check which arrow key
				if (code == 39) {
					// right arrow
					self.showNext();
				} else if (code == 37) {
					// left arrow
					self.showPrevious();
				}
			});
		}
	}
};
