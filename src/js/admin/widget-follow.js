function updateSocialMedia()
{
    $('.fa-widget').on('click', function(e) {
        e.preventDefault();

        var $this   = $(this),
            $input  = $('input#' + $this.attr('data-id'));

        // Toggle class to enable/disable icon
        $this.toggleClass('fa-active');

        // Trigger click event to check/uncheck checkbox
        $input.trigger('click');
    });
}

// Update social media profiles
updateSocialMedia();

// Widget updated
$(document).on('widget-updated', function(e, widget) {

    // Trigger change event
    e.trigger('change');

    // Update social media
    updateSocialMedia();
});

// Widget added
$(document).on('widget-added', function(e, widget) {

    // Update social media
    updateSocialMedia();
});
