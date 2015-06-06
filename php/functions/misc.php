<?php

	/**
	 * ADD FEATURED IMAGE
	 */
	add_theme_support('post-thumbnails');
	

	/**
	 * Register Menu
	 */
	add_action('init', function() {
		register_nav_menu('header-menu', __("Header Menu"));
	});

?>