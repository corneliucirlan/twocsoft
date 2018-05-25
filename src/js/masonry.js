var $container  = $('.cards');
var	element		= '.card-wrapper';

$container.imagesLoaded(function() {
    $container.masonry({
        'columnWidth': element,
        'itemSelector': element
    });
});
