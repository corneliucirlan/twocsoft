// Opening jQuery
//@codekit-prepend "jquery-header.js"

var $menuToggler    = $('.navbar-toggler');
var $headerMenu     = $('.navbar-nav-header');
var activateClass   = 'active';

$menuToggler.on('click', function() {

    $headerMenu.toggleClass(activateClass);
    $menuToggler.toggleClass(activateClass);

});

// Social share
$('.social-link').on('click', function(event) {
    event.preventDefault();

    var popup = {width: 500, height: 350};
    window.open($(this).find('a').attr('href'), '', 'toolbar=no, location=yes, status=no, scrollbars=no, resizable=yes, left=10, top=10, width=' + popup.width + ', height=' + popup.height);
});

// Closing jQuery
//@codekit-prepend "jquery-footer.js"
