let $menuToggler    = $('.navbar-toggler'),
    $headerMenu     = $('.navbar-nav-header'),
    $overlay        = $('.mobile-menu-overlay'),
    activateClass   = 'active';

$menuToggler.on('click', () => {

    $headerMenu.toggleClass(activateClass);
    $menuToggler.toggleClass(activateClass);
    $overlay.toggleClass(activateClass);

});
