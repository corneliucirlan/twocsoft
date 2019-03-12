$('.form-group input, textarea').focusout(function() {

    let textValue = $(this).val();

    if (textValue === '') {
        $(this).removeClass('has-value');
    } else {
        $(this).addClass('has-value');
    }
});

$('#contact-form').on('submit', function(event) {
    event.preventDefault();

    let $formParent     = $('.page-contact-form'),
        $submitButton   = $('#submit-form'),
        sendMessage     = 'Send message',
        loadingSpinner  = '<span class="loading-spinner"></span>',
        mailFail        = '<i class="fas fa-times"></i>',
        mailSuccess     = '<i class="fas fa-check"></i>',
        hasValue        = 'has-value',
        btnError        = 'btn-error',
        btnSuccess      = 'btn-success',
        btnProcessing   = 'btn-processing';

    // Get form data
    let data = $(this).serialize();
    console.log(data);

    $.ajax({
        url: ajaxurl,
        type: 'POST',
        dataType: 'json',
        data: data,
        beforeSend: () => {

            // Disable all fields
            $('input, textarea').prop('disabled', true);

            // Update button's content
            $submitButton.html(loadingSpinner);
        }
    })
    .done((data, textStatus, jqXHR) => {
        if (data.emailSent) {
            $submitButton.removeClass('btn-error btn-processing').addClass('btn-success').html(mailSuccess);
        } else {
            $submitButton.removeClass('btn-processing btn-success').addClass('btn-error').html(mailFail);
        }
    })
    .fail((jqXHR, textStatus, errorThrown) => {
        $submitButton.removeClass('btn-processing btn-success').addClass('btn-error').html(mailFail);
    })
    .always((data, textStatus) => {

        // Reset inputs
        if ('success' === textStatus) {
            $('#contact-form')[0].reset();
        }

        $('button, input, textarea').prop('disabled', false).removeClass('has-value');
        setTimeout(() => {
            $submitButton.html(sendMessage).removeClass('btn-error btn-success');
        }, 4000);
    });
});
