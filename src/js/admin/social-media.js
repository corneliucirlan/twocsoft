// $('input[type=checkbox]').on('click', function() {
$('i.fa-social').on('click', function() {

    var $this   = $(this),
        $input  = $('input#' + $this.attr('data-id'));

    // Activate icon
    $(this).toggleClass('fa-active');

    // Toggle input check
    $input.prop('checked', !$input.prop('checked'));

    // Toggle input meta
    if ($input.prop('checked')) $('.' + $input.prop('id')).addClass('active');
    else $('.' + $input.prop('id')).removeClass('active');
});
