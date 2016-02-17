<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

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
	$portfolio = new CC_CPT(array(
		'post_type_name'	=> POST_TYPE_PORTFOLIO,
		'singular'			=> 'Portfolio',
		'plural'			=> 'Portfolio',
		'slug'				=> POST_TYPE_PORTFOLIO
	), array('has_archive' => false));
	$portfolio->register_taxonomy('type');

	/**
	 * LOAD ACF TEMPLATES
	 */
	include_once(TCS_URI.'/php/templates/acf/frontpage.php');
	include_once(TCS_URI.'/php/templates/acf/portfolio.php');
	include_once(TCS_URI.'/php/templates/acf/services.php');

?>