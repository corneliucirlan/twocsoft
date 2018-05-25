$('.form-group input, textarea').focusout(function() {

    var textValue = $(this).val();

    if (textValue === '') {
        $(this).removeClass('has-value');
    } else {
        $(this).addClass('has-value');
    }
});

$('#contact-form').on('submit', function(event) {
    event.preventDefault();

    var $formParent = $('.page-contact-form');
    var spinner = '<i class="fa fa-spinner fa-pulse"></i>';

    // Get form data
    var data = $(this).serialize();

    $.ajax({
        url: ajaxurl,
        type: 'POST',
        dataType: 'json',
        data: data,
        beforeSend: function() {

            // Disable all fields
            $('button, input, textarea').prop('disabled', true);

            // Update button's content
            $('#submit-form').html(spinner);
        }
    })
    .done(function(data, textStatus, jqXHR) {
        console.log(data);
        console.log(textStatus);
        console.log(jqXHR);

        $('#contact-form').append('<div class="alert alert-success">Message sent</div>');
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        $('#contact-form').append('<div class="alert alert-warning">Message not sent</div>');
    })
    .always(function(data, textStatus) {

        // Reset inputs
        if ('success' === textStatus) {
            $('#contact-form')[0].reset();
        }

        $('button, input, textarea').prop('disabled', false);
        $('#submit-form').html('Send message');
    });
});
