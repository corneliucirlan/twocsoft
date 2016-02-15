<?php

	/**
	 * ADD FEATURED IMAGE
	 */
	add_theme_support('post-thumbnails');
	

	/**
	 * REGISTER MENU
	 */
	add_action('init', function() {
		register_nav_menu('header-menu', __("Header Menu"));
	});


	/**
	 * REMOVE IMAGE MEDIA LINKS
	 */
	add_action('admin_init', function() {
    	$image_set = get_option( 'image_default_link_type' );
    	if ($image_set !== 'none')
        	update_option('image_default_link_type', 'none');
	}, 10);


	/**
	 * ADD HEADER SUPPORT
	 */
	add_theme_support('custom-header');

	/**
	 * CREATE CUSTOM POST TYPES
	 */
	$websites = new CC_CPT(POST_TYPE_WEBSITE, array('rewrite' => array('slug' => 'projects')));
//	$websites->register_taxonomy('website_type');

	$plugins = new CC_CPT(POST_TYPE_PLUGIN, array('rewrite' => array('slug' => 'projects')));

?>