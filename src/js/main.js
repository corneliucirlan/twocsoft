// jQuery
//@prepros-prepend "../../node_modules/jquery/dist/jquery.js"

// Mobile menu
//@prepros-prepend "../../node_modules/jquery-mdstrap/dist/js/jquery-mdstrap.js"

// Images Loaded dependency
//@prepros-prepend "../../node_modules/ev-emitter/ev-emitter.js"

// Images Loaded
//@prepros-prepend "../../node_modules/imagesloaded/imagesloaded.js"

// Masonry
//@prepros-prepend "../../../../../wp-includes/js/masonry.min.js"

// Parallax script
//@prepros-prepend "parallax.js"

jQuery(document).ready(function($) {

    // Parallax
    parallax();

	// Card effects
	cardEffects();

	// Masonry layout
	masonryLayout();

	// Input fields
	inputFields();

	// Mobile menu
	$('.navbar-nav-left').mdStrap();

	// Share buttons popup
	shareButtonPopup();

	// PrismJS
	$('pre').addClass('language-php');

	// Contact form processing
	processContactForm();

	// Card effects
	function cardEffects()
	{
		$('.card').on('mouseover', function() {
			$(this).find('.wp-post-image').addClass('hover');
		});
		$('.card').on('mouseout', function() {
			$(this).find('.wp-post-image').removeClass('hover');
		});
	}

	// Masonry layout
	function masonryLayout()
	{
		var $container  = $('.cards'),
			element		= '.card-wrapper';

		$container.imagesLoaded(function() {
			$container.masonry({
				'columnWidth'	: element,
				'itemSelector'	: element
			});
		});
	}

	// Input fields
	function inputFields()
	{
		$('.form-group input, textarea').focusout(function() {

			var text_val = $(this).val();

			if(text_val === "") $(this).removeClass('has-value');
			else $(this).addClass('has-value');

		});
	}

	// Share buttons popup
	function shareButtonPopup()
	{
		$('.share-button').on('click', function(event) {
			event.preventDefault();

			var popup = {width: 500, height: 350};
			window.open($(this).find('a').attr('href'), "", "toolbar=no, location=yes, status=no, scrollbars=no, resizable=yes, left=10, top=10, width="+popup.width+", height="+popup.height);
		});
	}

	// Toggle submit button
	function toggleSubmit()
	{
		// toggle submit button
		$('#submit-form').toggle();

		// toggle preloader
		$('#form-progress').toggle();
	}

	// Process contact form
	function processContactForm()
	{
		$('#contact-form').on('submit', function(event) {
			event.preventDefault();

			var $formParent = $('.page-contact-form'),
				spinner		= '<i class="fa fa-spinner fa-pulse"></i>';

			var data = $(this).serialize();

			$.ajax({
				url: ajaxurl,
				type: 'POST',
				dataType: 'json',
				data: data,
				beforeSend: function()
				{
					// Disable all fields
					$('button, input, textarea').prop('disabled', true);

					// Update button's content
					$('#submit-form').html(spinner);

                    // Blur form
                    $(this).addClass('blurred');
				}
			})
			.done(function(data, textStatus, jqXHR) {
				console.log(data);
                console.log(textStatus);

                $('#contact-form').append('<div class="alert alert-success">Message sent</div>');
			})
			.fail(function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
                $('#contact-form').append('<div class="alert alert-warning">Message not sent</div>');
			})
			.always(function(data, textStatus, jqXHR) {

                // Reset inputs
                if ('success' === textStatus)
                    $('#contact-form')[0].reset();

				$('button, input, textarea').prop('disabled', false);
				$('#submit-form').html('Send message');
			});
		});
	}
});
