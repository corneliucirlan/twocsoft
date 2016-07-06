;(function($) {
    "use strict";

    $.fn.mdStrap = function($opts)
    {
        // Declare variables
        var wScroll 			= $(window).scrollTop(),
            scrollValue			= '10',
            mobileMenuBreak		= '992';

        var defaults = {
            'scrollValue'       : '10',
            'mobileMenuBreak'   : '992',
        };

        // Declare function variables
        var $menu = $(this);
        var $menuParent = $menu.parents('nav');

        // Initialize
        initialize();

        // Init function
        function initialize()
        {
            // Append overlay to document
            $('body').prepend('<div class="overlay"></div>');
        };

        // Toggle menu
        function toggleMenuDisplay()
        {
            if ($(this).width() >= mobileMenuBreak)
                    $menu.css({
                        'display': 'block',
                        'left': '0rem'
                    });
                else
                    $menu.css({
                        'display': 'none',
                        'left': '-13rem'
                    });
        };

        // Close mobile menu
        function closeMobileMenu()
        {
            var wScroll = $(window).scrollTop();

            $menu
                .css({
                    'display' : 'none',
                })
                .animate({
                    'left' : '-13rem'
                });

            if (wScroll > scrollValue)
                $menuParent.addClass('fixed-top');

            toggleOverlay();
        };

        // Toggle overlay
        function toggleOverlay()
        {
            $('.overlay').fadeToggle('fast');
            $('body').toggleClass('block-scroll');
        };

        // Close menu on ESC key
        $(document).on('keydown', function(event) {
            if (event.keyCode == 27 && $('.overlay:visible').length > 0)
            closeMobileMenu();
        });

        // Close menu when overlay clicked
        $('.overlay').on('click', function(event) {
            closeMobileMenu();
        });

        // Reposition menu on browser resize
        $(window).on('resize', function(event) {
            toggleMenuDisplay();
        });

        // Animate mobile menu
        $('.navbar-toggler').on('click', function(event) {
            event.preventDefault();

            toggleOverlay();
            console.log($menu);

            $menu
                .css({
                    'display' : 'block',
                })
                .animate({
                    'left' : '0rem'
                });

            $menuParent.removeClass('fixed-top');
        });

    };

})(jQuery);
