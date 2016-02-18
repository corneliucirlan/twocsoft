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
	 * CHANGE YOAST SEO PRIORITY TO LOW
	 */
	add_filter('wpseo_metabox_prio', function() { return 'low';});


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
	 * REMOVE IMAGE MEDIA LINKS
	 */
	add_action('admin_init', function() {
    	$image_set = get_option( 'image_default_link_type' );
    	if ($image_set !== 'none')
        	update_option('image_default_link_type', 'none');
	}, 10);


	/**
	 * ADD CUSTOM FILDS
	 */
	add_action('admin_init', function() {

		// footer center text
		register_setting('reading', 'footer_center_text');
		add_settings_field('footer_center_text', __('<label for="footer_center_text">Footer center text</label>'), 'displayFooterCenterText', 'reading', 'default');

		// bitly API key
		register_setting('general', 'bitly_api_key');
		add_settings_field('bitly_api_key', __('<label for="bitly_api_key">Bitly API key</label>'), 'displayBitlyAPIKey', 'general', 'default');

	});

	// Footer center text callback
	function displayFooterCenterText()
	{
		wp_editor(get_option('footer_center_text') ? get_option('footer_center_text') : '', 'footer_center_text');
	}

	// Bitly API Key callback
	function displayBitlyAPIKey()
	{
		?>
		<input class="regular-text" type="text" name="bitly_api_key" value="<?php echo get_option('bitly_api_key') ? get_option('bitly_api_key') : '' ?>" placeholder="" />
		<?php
	}


	/**
	 * LOAD ACF TEMPLATES
	 */
	include_once(TCS_URI.'/php/templates/acf/frontpage.php');
	include_once(TCS_URI.'/php/templates/acf/portfolio.php');
	include_once(TCS_URI.'/php/templates/acf/services.php');


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

?>