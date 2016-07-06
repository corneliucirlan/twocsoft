jQuery(document).ready(function($) {

	// Declare variables
	var wScroll 			= $(window).scrollTop(),
		scrollValue			= '10',
		mobileMenuBreak		= '992',

		$mobileMenu         = $('.navbar-nav'),
		$mobileMenuParent   = $('header nav');


	$('.navbar-nav').mdStrap();

	// Center title vertically
	var $headerWrapper = $('.header-wrapper');
	$headerWrapper.css({
		'top'	: 'calc(50% - '+ $headerWrapper.height()/2 +'px)',
	});
	$(window).on('scroll', function(event) {
		event.preventDefault();

		var wScroll = $(window).scrollTop();
//		console.log(wScroll);

		$headerWrapper.css({
			'top'	: 'calc(50% - '+ $headerWrapper.height()/2 +'px + '+ wScroll/2 +'px)',
		});
	});



	// Share buttons popup
	$('.share-button').on('click', function(event) {
		event.preventDefault();

		var popup = {width: 500, height: 350};
		window.open($(this).find('a').attr('href'), "", "toolbar=no, location=yes, status=no, scrollbars=no, resizable=yes, left=10, top=10, width="+popup.width+", height="+popup.height);
	});

	// Detect scroll
	if (wScroll > scrollValue) $mobileMenuParent.addClass('fixed-top');
		else $mobileMenuParent.removeClass('fixed-top');
	$(window).on('scroll', function(event) {
		event.preventDefault();

		var wScroll = $(window).scrollTop();

		// Stick navigation to top
		if (wScroll > scrollValue) $mobileMenuParent.addClass('fixed-top');
			else $mobileMenuParent.removeClass('fixed-top');
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
