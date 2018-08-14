/**
 * 1415 GNU Blog WordPress Theme - http://www.gnu.com
 * Author: brian.behrens@mervin.com - http://www.mervin.com
 */

var GNUBLOG = GNUBLOG || {};

GNUBLOG.SearchResults = function () {
	this.init();
};
GNUBLOG.SearchResults.prototype = {
	init: function () {
		var self, prevHash;
		self = this;
		// listen for hash change
		prevHash = window.location.hash;
		window.setInterval(function () {
			if (window.location.hash != prevHash) {
				checkHash();
			}
		}, 100);
		function checkHash() {
			if(window.location.hash.split("gsc.q=").length > 1) {
				prevHash = window.location.hash;
				var query = prevHash.split("gsc.q=");
				query = query[1].split("&");
				$('.section-header .subtitle').html(decodeURI(query[0]));
			}
		}
		checkHash();
	}
};
