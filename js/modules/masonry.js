define(['jquery', 'components/masonry'], function($) {

	var masonry;

	var m = {
		run: function() {

			//container
			var container = document.getElementById('masonry');

			if (container) {
				masonry = new Masonry(container, {
					columnWidth:317,
					gutterWidth:24
				});
			}
		}
	};

	return m;
});