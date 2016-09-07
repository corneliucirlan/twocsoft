<?php

	// Register menus
	add_action('init', function() {

		// Header menu
		register_nav_menu('header-menu', __('Header menu'));

		// Footer menu
		register_nav_menu('footer-menu', __('Footer menu'));
	});

	// Add favicons to head
	add_action('wp_head', function() {
		?>
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo THEME_URI ?>img/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo THEME_URI ?>img/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo THEME_URI ?>img/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo THEME_URI ?>img/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo THEME_URI ?>img/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo THEME_URI ?>img/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo THEME_URI ?>img/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo THEME_URI ?>img/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo THEME_URI ?>img/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo THEME_URI ?>img/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo THEME_URI ?>img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo THEME_URI ?>img/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo THEME_URI ?>img/favicon/favicon-16x16.png">
		<link rel="manifest" href="<?php echo THEME_URI ?>img/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo THEME_URI ?>img/favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		<?php
	});

	// Enqueue scripts
	add_action('wp_enqueue_scripts', function() {

		// Main stylesheet
		wp_enqueue_style('main-style');

		// Mobile menu
		wp_enqueue_script('mobile-menu');

		// JS functions
		wp_enqueue_script('js-functions');

		// images loaded
		wp_enqueue_script('images-loaded');
	});

	// WP Footer hook
	add_action('wp_footer', function() {

		// PrismJS
		wp_enqueue_style('prism-css');
		wp_enqueue_script('prism-js');

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
