// jQuery
//@prepros-prepend "../bower_components/jquery/jquery.js"

// Mobile menu
//@prepros-prepend "../bower_components/jquery-mdstrap/dist/js/jquery-mdstrap.js"

// Images Loaded dependency
//@prepros-prepend "../bower_components/ev-emitter/ev-emitter.js"

// Images Loaded
//@prepros-prepend "../bower_components/imagesloaded/imagesloaded.js"

// Masonry
//@prepros-prepend "../../../../wp-includes/js/masonry.min.js"

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


	// Parallax
	function parallax()
	{
		var $bgImage = $('.header-image'),
			bgImageHeight = $bgImage.height(),
			bgImageXPosition = $bgImage.css('background-position').split(' ')[0];

		$(window).on('scroll', function() {

			var wScroll = $(window).scrollTop();
			if (wScroll <= bgImageHeight)
			{
				// Parallax background image
				$('.header-image').css({
					'background-position': bgImageXPosition + ' ' + wScroll / 2 + 'px',
				});

				// Background image overlay
				$('.header-overlay').css({
					'background-color': 'rgba(255, 255, 255, ' + (wScroll / bgImageHeight) + ')',
				});
			}
		});
	}

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
	}
});
