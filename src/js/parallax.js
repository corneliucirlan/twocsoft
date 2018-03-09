// Parallax
function parallax()
{
    var $bgImage            = $('.header-image'),
        $backgroundOverlay  = $('.header-overlay'),
        bgImageHeight       = $bgImage.height(),
        bgImageXPosition    = $bgImage.css('background-position').split(' ')[0];

    $(window).on('scroll', function() {

        var wScroll = $(window).scrollTop();
        if (wScroll <= bgImageHeight)
        {
            // Parallax background image
            $bgImage.css({
                'background-position': bgImageXPosition + ' ' + wScroll / 2 + 'px',
            });

            // Background image overlay
            $backgroundOverlay.css({
                'background-color': 'rgba(245, 245, 245, ' + (wScroll / bgImageHeight) + ')',
            });
        }
    });
}
