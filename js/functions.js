jQuery(document).ready(function($) {

	$('.form-group input, textarea').focusout(function() {

	    var text_val = $(this).val();
		console.log(text_val);

	    if(text_val === "") $(this).removeClass('has-value');
	    	else $(this).addClass('has-value');

	});


	// Declare variables
	var wScroll 			= $(window).scrollTop(),
		scrollValue			= '10',
		mobileMenuBreak		= '992',

		$mobileMenu         = $('.navbar-nav'),
		$mobileMenuParent   = $('header nav');

	// Mobile menu
	$mobileMenu.mdStrap();


	// Share buttons popup
	$('.share-button').on('click', function(event) {
		event.preventDefault();

		var popup = {width: 500, height: 350};
		window.open($(this).find('a').attr('href'), "", "toolbar=no, location=yes, status=no, scrollbars=no, resizable=yes, left=10, top=10, width="+popup.width+", height="+popup.height);
	});


	// PrismJS
	$('code').addClass('language-php');


	// Contact form processing
	$('#contact-form').on('submit', function(event) {
		event.preventDefault();

		var $formParent = $('.page-contact-form');

		var data = $(this).serialize();

		$.ajax({
			url: ajaxurl,
			type: 'POST',
			dataType: 'json',
			data: data,
			beforeSend: function()
			{
				// Email sent
				$formParent.addClass('is-sent');
				$('#contact-form')[0].reset();
				setTimeout(function() {
					$formParent.removeClass('is-sent');
				}, 1800);
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
