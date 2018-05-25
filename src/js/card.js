$('.card').on('mouseout', function() {
    $(this).find('.wp-post-image').removeClass('hover');
});

$('.card').on('mouseover', function() {
    $(this).find('.wp-post-image').addClass('hover');
});
