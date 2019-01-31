var $menuToggler    = $('.navbar-toggler');
var $headerMenu     = $('.navbar-nav-header');
var activateClass   = 'active';

$menuToggler.on('click', function() {

    $headerMenu.toggleClass(activateClass);
    $menuToggler.toggleClass(activateClass);

});
