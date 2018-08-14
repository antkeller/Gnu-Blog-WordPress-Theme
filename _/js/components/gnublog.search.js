/**
 * 1718 GNU Blog WordPress Theme - http://www.gnu.com
 * Author: tony.keller@mervin.com - http://www.mervin.com
 */

var GNUBLOG = GNUBLOG || {};

GNUBLOG.Search = function () {
	this.init();
};

GNUBLOG.Search.prototype = {
	init: function () {
		$('header .search-toggle-wrapper .search-toggle').on('click', function (e) {
			console.log('Search');
			e.preventDefault();
			e.stopPropagation(); // kill even from firing further
			$('#searchform').toggleClass('visible');
			$('#searchform .text-input').focus();
			$('#searchform .text-input').val('');
			// listen for escape key
			$(document).on('keyup', function (e) {
				if (e.keyCode == 27) {
					$('#searchform').toggleClass('visible');
					// kill event listeners
					$(document).off('keyup');
					$(document).off('click');
					$('#searchform').off('click');
				}
			});
			// hide if clicked anywhere outside search area
			$(document).on('click', function () {
				$('#searchform').toggleClass('visible');
				// kill event listeners
				$(document).off('keyup');
				$(document).off('click');
				$('#searchform').off('click');
			});
			// don't hide if clicked within search area
			$('#searchform').on('click', function (e) {
				e.stopPropagation();
			});
		});
	}
};
