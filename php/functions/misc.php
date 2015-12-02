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
	 * CREATE CUSTOM POST TYPES
	 */
	$custom = new CustomPostType('text-domain');

	// WEBSITES
	$custom->make(POST_TYPE_WEBSITE, 'Website', 'Websites', array('rewrite' => array('slug' => 'projects/'.sanitize_title_with_dashes('Websites'))));

	// PLUGINS
	$custom->make(POST_TYPE_PLUGIN, 'Plugin', 'Plugins', array('rewrite' => array('slug' => 'projects/'.sanitize_title_with_dashes('Plugins'))));

?>