jQuery(document).ready(function($) {

	$.ajaxSetup({cache: true});
	
	/**
	 * LOAD FACEBOOK JS API
	 */
	$.getScript('//connect.facebook.net/en_US/sdk.js', function(){
		FB.init({
			appId: '730165393722202',
    		version: 'v2.1' // or v2.0, v2.1, v2.0
  		});     
		
		//$('#loginbutton,#feedbutton').removeAttr('disabled');
		//FB.getLoginStatus(updateStatusCallback);
	});
	

	$('.share-website').on('click', 'a.facebook', function(event) {
		event.preventDefault();
		
		FB.ui({
			method: 'share',
			href: location.href,
		}, function(response){
			console.log(response);
		});
	});

	// PROJECT TABS
	$('#projects ul').on('click', 'li a', function(event) {
		event.preventDefault();

		// remove active class from all elements
		$('.nav-tabs li').removeClass('active')
		$('#projects').find('.projects-tab').removeClass('show').addClass('hidden');

		// add active class to current elements
		$(this).parent().addClass('active');
		$($(this).attr('href')).removeClass('hidden').addClass('show');
	});

	var isVisible = $(this).find('.extra').is(':visible');
	
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