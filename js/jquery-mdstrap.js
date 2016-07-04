;(function($) {

    // Declare variables
    var wScroll 			= $(window).scrollTop(),
        scrollValue			= '10',
        mobileMenuBreak		= '992',

        $mobileMenu         = $('.navbar-nav'),
        $mobileMenuParent   = $('header nav');


    $.mdStrap = function()
    {
        // Reposition menu on browser resize
        $(window).on('resize', function(event) {

            if ($(this).width() >= mobileMenuBreak)
                    $mobileMenu.css({
                        'display': 'block',
                        'left': '0rem'
                    });
                else
                    $mobileMenu.css({
                        'display': 'none',
                        'left': '-13rem'
                    });

        });

        // Append overlay to document
        $('body').prepend('<div class="overlay"></div>');

        // Animate mobile menu
        $('.navbar-toggler').on('click', function(event) {
            event.preventDefault();

            toggleOverlay();

            $mobileMenu
                .css({
                    'display' : 'block',
                })
                .animate({
                    'left' : '0rem'
                });

            $mobileMenuParent.removeClass('fixed-top');
        });

        // Close menu on ESC key
        $(document).on('keydown', function(event) {
            if (event.keyCode == 27 && $('.overlay:visible').length > 0)
                closeMobileMenu();
        });

        // Close menu when overlay clicked
        $('.overlay').on('click', function(event) {
            event.preventDefault();

            closeMobileMenu();
        })

        // Close mobile menu
        function closeMobileMenu()
        {
            var wScroll = $(window).scrollTop();

            $mobileMenu
                .css({
                    'display' : 'none',
                })
                .animate({
                    'left' : '-13rem'
                });

            if (wScroll > scrollValue)
                $mobileMenuParent.addClass('fixed-top');

            toggleOverlay();
        }

        // Toggle overlay
        function toggleOverlay()
        {
            $('.overlay').fadeToggle('fast');
            $('body').toggleClass('block-scroll');
        }

    };



})(jQuery);
