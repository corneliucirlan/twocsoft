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
		$(this).append("<p>Click</p>");
	});
});