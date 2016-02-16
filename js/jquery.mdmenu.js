;(function ($) {
	"use strict";

	$.mdMenu = function(button, settings)
	{
		// default plugin settings
		var defaults = {
			"minWidth": 240,
			"fixedTop": true,
			"stickyAt": 20,
		};
		
		// all CSS classes used by plugin
		this.classes = {
			"enableScroll": 	"mdmenu-enable-scroll",
			"disableScroll": 	"mdmenu-disable-scroll",
			"navFixedTop": 		"mdmenu-fixed-top",
			"navbarStickyTop": 	"mdmenu-sticky-top",
			"overlay": 			"mdmenu-overlay",
			"overlayVisible": 	"mdmenu-overlay-visible",
			"menuVisible": 		"mdmenu-visible",
		};
		
		// body overlay
		var overlay = '<div class="'+this.classes.overlay+'"></div>';

		// plugin settings
		this.settings = {};

		// clicked button
		this.$button = $(button);
		this.$button.data('materialDesignMenu', this);

		// nav parent
		this.navMenu = this.$button.closest('nav');

		// menu div
		this.divMenu = this.$button.attr('data-target');


		// initialization function
		this.init = function()
		{
			// map settings
			this.settings = $.extend({}, defaults, settings);

			// add overlay
			$('body').prepend(overlay).addClass(this.classes.enableScroll);

			// fixed top menu
			if (this.settings.fixedTop)
				this.navMenu.addClass(this.classes.navFixedTop);

			// DEBUG ONLY
			console.log(this.settings);
		};

		this.resizeMenuHeight = function(nav, menu)
		{
				var windowHeight = $(window).height();
				var minHeight = "100%";
				var navHeight = nav.outerHeight();
				var menuHeight = menu.height();
				var navColor = nav.css('background-color');
				
				if (menuHeight+navHeight > windowHeight) minHeight = menuHeight = windowHeight-navHeight;
					else menuHeight = "100%";

				menu.css({
					"top": navHeight,
					"min-height": minHeight,
					"height": menuHeight,
					"background-color": navColor,
				});
		};

		this.toggleScroll = function(element)
		{
			var $element = $(element);

			// element is still scrollable
			if ($element.hasClass(this.classes.enableScroll))
				return $element.removeClass(this.classes.enableScroll).addClass(this.classes.disableScroll);
	
			if ($element.hasClass(this.classes.disableScroll))
				return $element.removeClass(this.classes.disableScroll).addClass(this.classes.enableScroll);
		};

		// initialize
		this.init();

	};


	$.fn.mdMenu = function(settings)
	{
		return this.each(function() {
			
			// CREATE NEW MENU
			var $menu = new $.mdMenu(this, settings);
			var $navMenu = $($menu.navMenu);
			var $divMenu = $($menu.divMenu);

			// CLICK LISTENER
			$menu.$button.on('click', function(event) {
				event.preventDefault();

				var navHeight = $menu.navMenu.outerHeight();

				$menu.resizeMenuHeight($navMenu, $divMenu);

				$menu.toggleScroll('body');
				$divMenu.addClass($menu.settings.enableScroll);
				
				// toggle overlay
				$('.'+$menu.classes.overlay).fadeToggle().toggleClass($menu.classes.overlayVisible);
				
				// toggle menu
				$divMenu.toggleClass('mdmenu-visible');
			});

			// CLOSE MENU WHEN CLICKING ON OVERLAY
			$('.'+$menu.classes.overlay).on('click', function(event) {
				event.preventDefault();
				
				$menu.toggleScroll('body');
				$(this).fadeToggle().toggleClass($menu.classes.overlayVisible);
				$divMenu.toggleClass($menu.classes.menuVisible);
			});

			// STICK NAVIGATION TO THE TOP ON SCROLL
			if ($menu.settings.stickyAt > 0)
			{
				$(window).on('scroll', function() {
					if ($(document).scrollTop() > $menu.settings.stickyAt) $navMenu.addClass($menu.classes.navbarStickyTop);
						else $navMenu.removeClass($menu.classes.navbarStickyTop);
					 	
					if ($($menu.$button).is(':visible'))
						$divMenu.css({
							'background-color': $navMenu.css('background-color'),
							top: $navMenu.outerHeight(),
						});
				});
			}

			// ADJUST MENU ON WINDOW RESIZE (ie PORTRAIT TO LANDSCAPE)
			$(window).on('resize', function(event) {
				event.preventDefault();
				
				$menu.resizeMenuHeight($navMenu, $divMenu);
			});
		});
	};

})(jQuery);