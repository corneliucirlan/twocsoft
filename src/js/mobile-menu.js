let $menuToggler    = $('.navbar-toggler'),
    $headerMenu     = $('.navbar-nav-header'),
    activateClass   = 'active';

$menuToggler.on('click', () => {

    $headerMenu.toggleClass(activateClass);
    $menuToggler.toggleClass(activateClass);

});
