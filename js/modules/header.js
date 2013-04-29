define(['jquery', 'helpers/binder'], function($, Binder) {

	//get menu items
	var menu = $('nav ul li a');

	//get header
	var header = $('header');

	//get sub-menu container
	var sub = $('#sub-menus');

	//get all sub menus
	var subMenus = $('.sub-menu');

	var m = {
		scroll: function() {
			var top = $(window).scrollTop();

			if (top > 111) {
				header.addClass('offset');
			} else {
				header.removeClass('offset');
				header.css({top:-top});
			}
		},

		show: function() {
			//sub.addClass('open');
			sub.slideDown(1200);
		},

		hide: function() {
			//sub.removeClass('open');
			sub.slideUp(1200);
		},

		showSubMenu: function(el) {

			//context
			el = el || this;

			//extract id
			var id = $(el).data('id');

			console.log(el, id);

			//show sub menu
			$('#sub-menu-' + id).addClass('active');
		},

		hideSubMenus: function() {
			subMenus.removeClass('active');
		}
	};

	//run scroll function
	$(window).load(function() {
		m.scroll();
	});

	var tID, tIDb, b = new Binder({
		window: {
			scroll: [
				m.scroll
			]
		},

		'nav ul li a': {
			mouseover: [
				function() {
					var that = this;
					tID = setTimeout(function() {
						m.show(that);
					}, 500);

					m.hideSubMenus();
					m.showSubMenu(this);
				},
			],

			mouseleave: [
				function() {
					clearTimeout(tID);
				}
			]
		},

		'#sub-menus': {
			mouseleave: [
				function() {
					tIDb = setTimeout(function() {
						m.hide();
					}, 300);
				}
			],

			mouseover: [
				function() {
					clearTimeout(tIDb);
				}
			]
		}
	});

	return m;
});