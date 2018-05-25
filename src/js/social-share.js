$('.share-button').on('click', function(event) {
    event.preventDefault();

    var popup = {width: 500, height: 350};
    window.open($(this).find('a').attr('href'), '', 'toolbar=no, location=yes, status=no, scrollbars=no, resizable=yes, left=10, top=10, width=' + popup.width + ', height=' + popup.height);
});
