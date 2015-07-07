jQuery(document).ready(function($) {

	// MOBILE MENU
	$('.navbar-toggle').mdMenu();

	// SERVICES PAGE MASONRY
	$('.services').masonry({
		itemSelector: '.service',
		isAnimated: true,
		columnWidth: '.service',
	});

	// PORJECTS MASONRY
	$('.projects-tab').masonry({
		itemSelector: '.project',
		isAnimated: true,
		columnWidth: '.project',
	});

	// SKILLS MASONRY
	$('.skills').masonry({
		itemSelector: '.skill',
		isAnimated: true,
		columnWidth: '.skill',
	});

	// PROJECT TABS
	$('#projects').tabs();

	//var isVisible = $(this).find('.extra').is(':visible');
	
	// ABOUT PAGE CARDS MOUSE OVER
	$('main').on('mouseover', '.card', function(event) {
		event.preventDefault();

		if ($(this).find('.extra').length > 0)
			$(this).find('.expander').removeClass('hidden').addClass('visible');
	});

	// ABOUT PAGE CARDS MOUSE OUT
	$('main').on('mouseout', '.card', function(event) {
		event.preventDefault();

		$(this).find('.expander').removeClass('visible').addClass('hidden');
	});

	// ABOUT PAGE CARDS CLICK
	$('main').on('click', '.card', function(event) {
		event.preventDefault();
		
		$(this).find('.extra').toggle('fast');
		$(this).find('.expander').toggleClass('glyphicon-resize-full glyphicon-resize-small');
	});

	$('.card').on('click', 'a', function(event) {
		event.preventDefault();
		
		window.open($(this).attr('href'), $(this).attr('target'));

		event.stopPropagation();
	});



	/**
	 * CONTACT FORM PROCESSING
	 */
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