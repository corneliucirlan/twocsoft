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
    var $submitButton = $('#submit-form');

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
            $submitButton.addClass('btn-click');
        }
    })
    .done(function(data, textStatus, jqXHR) {
        if (data.emailSent) {
            $submitButton.removeClass('btn-error btn-click').addClass('btn-success').html('<i class="fas fa-check"></i>');
        } else {
            $submitButton.removeClass('btn-click btn-success').addClass('btn-error').html('<i class="fas fa-times"></i>');
        }
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        $submitButton.removeClass('btn-click btn-success').addClass('btn-error').html('<i class="fas fa-times"></i>');
    })
    .always(function(data, textStatus) {

        // Reset inputs
        if ('success' === textStatus) {
            $('#contact-form')[0].reset();
        }

        $('button, input, textarea').prop('disabled', false).removeClass('has-value');
        setTimeout(function() {
            $submitButton.html('Send message').removeClass('btn-error btn-success btn-click');
        }, 4000);
    });
});
