// Opening jQuery
//@codekit-prepend "jquery-header.js"

var $menuToggler    = $('.navbar-toggler');
var $headerMenu     = $('.navbar-nav-header');
var activateClass   = 'active';

$menuToggler.on('click', function() {

    $headerMenu.toggleClass(activateClass);
    $menuToggler.toggleClass(activateClass);

});

// Closing jQuery
//@codekit-prepend "jquery-footer.js"
