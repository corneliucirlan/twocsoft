jQuery(document).ready(function($) {

	// Add language-php class to all <code> elements
	$('code').addClass('language-php');


	// set bottom margin to fit footer
    var bumpIt = function() {  
    	$('body').css('margin-bottom', $('footer').outerHeight());
    },
    didResize = false;

    bumpIt();

    $(window).resize(function() {
    	didResize = true;
    });
    setInterval(function() {  
    	if(didResize) {
    		didResize = false;
    		bumpIt();
    	}
    }, 250);

	var cardsContainer 	= '.md-cards-holder',
		card 			= '.md-card-holder';

	// MOBILE MENU
	$('.navbar-toggle').mdMenu();

	// PAGE MASONRY
	$(cardsContainer).imagesLoaded(function() {
		$(cardsContainer).masonry({
			itemSelector: 	card,
			columnWidth: 	card,
			isAnimated: 	true,
		});
	});


	// SHARE BUTTONS
	$('.share-button').on('click', function(event) {
		event.preventDefault();
		
		var popup = {width: 500, height: 350};
		window.open($(this).find('a').attr('href'), "", "toolbar=no, location=yes, status=no, scrollbars=no, resizable=yes, left=10, top=10, width="+popup.width+", height="+popup.height);
	});


	// CONTACT FORM PROCESSING
	$('#contact').submit(function(event) {
		event.preventDefault();
		
		var hasSuccessClass  	= 'has-success';
		var	hasWarningClass  	= 'has-warning';
		var	glyphiconOK		 	= 'glyphicon-ok';
		var	glyphiconWarning 	= 'glyphicon-warning-sign';
		var submitButtonSpinner = '<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>';
		var submitButtonText 	= 'Send message';

		var data = {
			'action': 'submit-form',
			'full-name': $('#full-name').val(),
			'email': $('#email').val(),
			'message': $('#message').val(),
		};

		$.ajax({
			url: TCSAjax.ajaxurl,
			type: 'POST',
			dataType: 'json',
			data: $(this).serialize(),
			beforeSend: function()
			{
				$('form input,textarea,button').prop('disabled', true);

				// submit button animation
				$('#submit-form').html(submitButtonSpinner);
			}
		})
		.done(function(data, textStatus, jqXHR) {
			console.log(data);
		})
		.fail(function(jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
		})
		.always(function(data, textStatus, jqXHR) {
			$('form input,textarea,button').prop('disabled', false);
			$('#submit-form').html(submitButtonText);

			// if email was sent
			if (data.emailSent === true)
					{
						$.each(data, function(index, el) {
							var $parent = $('#'+index).parent();
							var $icon = $('#'+index).next();
						
							$parent.removeClass(hasWarningClass).addClass(hasSuccessClass);
							$icon.removeClass(glyphiconWarning).addClass(glyphiconOK);
						});

						$('#submit-form').html("Message sent");
					}

				// email failed to send
				else
					{
						$.each(data, function(index, el) {
							var $parent = $('#'+index).parent();
							var $icon = $('#'+index).next();
				
							if (!el)
									{
										$parent.removeClass(hasSuccessClass).addClass(hasWarningClass);
										$icon.removeClass(glyphiconOK).addClass(glyphiconWarning);
									}
								else
									{
										$parent.removeClass(hasWarningClass).addClass(hasSuccessClass);
										$icon.removeClass(glyphiconWarning).addClass(glyphiconOK);
									}
						});

						if (!data.failReason) $('#submit-form').html("Something went wrong. Try again");
							else $('#submit-form').html(data.failReason);

						// log failure
						console.log(data.failReason);
					}
			
		});
		
	});
});