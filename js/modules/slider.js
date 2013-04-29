define(['jquery', 'helpers/binder'], function($, Binder) {

	var container = $('.slider');
	var slides = $('.slider .slide');
	var dots = $('.dots .dot');
	var node = 0, width = 1000, interval, i = 0;

	var m = {
		dot: function() {
			//get dot number
			var n = $(this).data('slide');
			i = n;
			m.moveActive();
			m.moveTo(i);
		},

		right: function() {
			if (i + 1 < dots.length) {
				m.moveTo(++i);
				m.moveActive();
			}
		},

		left: function() {
			if (i - 1 >= 0) {
				m.moveTo(--i);
				m.moveActive();
			}
		},

		setRotator: function() {
			clearInterval(interval);
			interval = setInterval(function() {
				m.next();
			}, 8000);
		},

		clearRotator: function() {
			clearInterval(interval);
		},

		next: function() {
			i = (i+1) % slides.length;
			m.moveTo(i);
			m.moveActive();
		},

		moveActive: function() {
			$(dots).removeClass('active');
			$(dots[i]).addClass('active');
		},

		findNode: function(n) {
			slides = $('.slider .slide');
			for(var j=0; j<slides.length; j++) {
				if ($(slides[j]).attr('id') == 'slider-slide-' + n) {
					return j;
				}
			}
		},

		moveTo: function(n) {

			var current = node;
			node = m.findNode(n);

			if (node == 0) {
				var f = $(slides).last().remove();
				f.css({left:-(width * 2)});
				$(slides).parent().prepend(f);
				node++;

			} else if (node == slides.length -1) {
				var f = $(slides).first().remove();
				f.css({left:width * 2});
				$(slides).parent().append(f);
				node--;
			}

			slides = $('.slider .slide');

			setTimeout(function() {
				$(slides).each(function(n) {
					//1000px
					var l = (width * n) - (width * node);
					$(this).css({left:l});
				});
			}, 10);
			

			$(slides).removeClass('active');
			$(slides[node]).addClass('active');
		}
	};

	m.moveTo(i);
	m.moveActive();

	setTimeout(function() {
		container.addClass('animate');
		m.setRotator();
	}, 500);

	var b = new Binder({
		'.dots .dot': {
			click: [ m.dot, m.clearRotator ]
		},
		'.dots .left': {
			click: [ m.left ]
		},
		'.dots .right': {
			click: [ m.right ]
		},

		'.slider': {
			mouseleave: [ m.setRotator ]
		}
	});

	return m;
});