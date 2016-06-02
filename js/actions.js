jQuery(document).ready(function($) {

	// Fire sideNav
	$(".button-collapse").sideNav();

	// Masonry layout
	$('.masonry-elements').imagesLoaded(function() {
		$('.masonry-elements').masonry({
			itemSelector: 	'.masonry-element',
			columnWidth: 	'.masonry-element',
			isAnimated: 	true,
		});
	});

	// Share buttons popup
	$('.share-button').on('click', function(event) {
		event.preventDefault();
		
		var popup = {width: 500, height: 350};
		window.open($(this).find('a').attr('href'), "", "toolbar=no, location=yes, status=no, scrollbars=no, resizable=yes, left=10, top=10, width="+popup.width+", height="+popup.height);
	});

	// Detect scroll
	// Stick navigation to top
	if ($(window).scrollTop() > 10) $('header nav').addClass('fixed-top');
		else $('header nav').removeClass('fixed-top');
	$(window).on('scroll', function(event) {
		event.preventDefault();
		
		// Stick navigation to top
		if ($(window).scrollTop() > 10) $('header nav').addClass('fixed-top');
			else $('header nav').removeClass('fixed-top');
	});

	// PrismJS
	$('code').addClass('language-php');

	// Contact form processing
	$('#contact-form').on('submit', function(event) {
		event.preventDefault();

		
		var data = $(this).serialize();
		console.log(ajaxurl);

		$.ajax({
			url: ajaxurl,
			type: 'POST',
			dataType: 'json',
			data: $(this).serialize(),
			beforeSend: function()
			{
				// disable input fields
				$('form input,textarea').prop('disabled', true);
				
				// Toggle submit button
				toggleSubmit();
			}
		})
		.done(function(data, textStatus, jqXHR) {
			console.log(data);
		})
		.fail(function(jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.responseText);
		})
		.always(function(data, textStatus, jqXHR) {
			$('form input,textarea').prop('disabled', false);
			
			// Toggle submit button
			toggleSubmit();

			// If email was sent
			if (data.emailSent === true)
					
					// Materialize.toast(message, displayLength, className, completeCallback);
		  			Materialize.toast('Message sent.', 4000); // 4000 is the duration of the toast

				// Email failed to send
				else
					{
		  				// Message was not sent
		  				Materialize.toast('Message failed. Try again or use the address above the form.', 4000); // 4000 is the duration of the toast

						// log failure
						console.log(data.failReason);
					}
			
		});
	});

	// Toggle submit button
	function toggleSubmit()
	{
		// toggle submit button
		$('#submit-form').toggle();

		// toggle preloader
		$('#form-progress').toggle();
	}

});