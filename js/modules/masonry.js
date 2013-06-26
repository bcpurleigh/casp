define(['jquery', 'components/masonry'], function($) {

	var masonry;

	var m = {
		run: function() {
			$(document).ready(function() {
				var container = document.getElementById('masonry');
				if (container) {
					masonry = new Masonry(container, {
						columnWidth:317,
						gutterWidth:24
					});
				}
			});
		}
	};

	m.run();

	return m;
});