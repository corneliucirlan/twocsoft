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


	add_action('admin_menu', function() {
		remove_menu_page('edit.php');
	});
	add_action( 'init', function() {
		$labels = array(
			'name'                => __('Posts', 'text-domain'),
			'singular_name'       => __('Post', 'text-domain'),
			'add_new'             => _x('Add New Post', 'text-domain', 'text-domain'),
			'add_new_item'        => __('Add New Post', 'text-domain'),
			'edit_item'           => __('Edit Post', 'text-domain'),
			'new_item'            => __('New Post', 'text-domain'),
			'view_item'           => __('View Post', 'text-domain'),
			'search_items'        => __('Search Posts', 'text-domain'),
			'not_found'           => __('No Posts found', 'text-domain'),
			'not_found_in_trash'  => __('No Posts found in Trash', 'text-domain'),
			'parent_item_colon'   => __('Parent Post:', 'text-domain'),
			'menu_name'           => __('Posts', 'text-domain'),
		);

		register_post_type( 'post', array(
			'labels' 			=> $labels,
			'public' 			=> true,
			'_builtin' 			=> false, 
			'_edit_link' 		=> 'post.php?post=%d', 
			'capability_type' 	=> 'post',
			'map_meta_cap' 		=> true,
			'hierarchical' 		=> false,
			'rewrite' 			=> array( 'slug' => 'blog' ),
			'query_var' 		=> false,
			'supports' 			=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'post-formats' ),
			'menu_position' 	=> 5,
		));
	}, 1);


	/**
	 * CREATE CUSTOM POST TYPES
	 */
	$portfolio = new CC_CPT(array(
		'post_type_name'	=> POST_TYPE_PORTFOLIO,
		'singular'			=> 'Portfolio',
		'plural'			=> 'Portfolio',
		'slug'				=> POST_TYPE_PORTFOLIO
	), array('has_archive' => false, 'menu_position' => 5));
	$portfolio->register_taxonomy('kind');
	$portfolio->register_taxonomy('post_tag');

?>