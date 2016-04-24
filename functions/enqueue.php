<?php

	// Register menus
	add_action('init', function() {

		// Header menu
		register_nav_menu('header-menu', __('Header menu'));

		// Footer menu
		register_nav_menu('footer-menu', __('Footer menu'));
	});

	// Enqueue scripts
	add_action('wp_enqueue_scripts', function() {

		// Load Materialize framework
		//wp_register_style('google-icons', 'http://fonts.googleapis.com/icon?family=Material+Icons', '', '', 'all');
		//wp_enqueue_style('google-icons');
		wp_register_style('materialize-css', THEME_URI.'css/materialize.min.css', '', '', 'all');
		wp_enqueue_style('materialize-css');
		wp_register_script('materialize-js', THEME_URI.'js/materialize.min.js', array('jquery'), '', false);
		wp_enqueue_script('materialize-js');

		// Load main stylesheet
		wp_register_style('main-style', THEME_URI.'style.css', array('materialize-css'), '', 'all');
		wp_enqueue_style('main-style');


		// Load custom JS actions
		wp_register_script('actions', THEME_URI.'js/actions.js', array('jquery'), '', true);
		wp_enqueue_script('actions');

		// Load masonry
		wp_enqueue_script('masonry');

		// images loaded
		wp_register_script('images-loaded', THEME_URI.'js/imagesloaded.pkgd.min.js', array('jquery'), '', true);
		//wp_enqueue_script('images-loaded');
	});

	// WP Footer hook
	add_action('wp_footer', function() {

		// Register Font Awesome
		wp_register_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', '', '', 'all');
		wp_enqueue_style('font-awesome');

		// Define ajaxurl
		if (is_page(PAGE_CONTACT)):
			?><script type="text/javascript">var ajaxurl ='<?php echo admin_url('admin-ajax.php'); ?>';</script><?php
		endif;
	});

	// Add custom header support
	add_theme_support('custom-header');

	// Add featured image
	add_theme_support('post-thumbnails');

?>