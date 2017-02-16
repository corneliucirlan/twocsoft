<?php

	// Autoload PHP dependencies via Composer
	require_once(THEME_DIR.'vendor/autoload.php');

	// Load ACF fields
	require_once(THEME_DIR.'functions/acf.php');

	// Load breadcurmbs
	include_once(THEME_DIR.'functions/classes/breadcrumbs.php');

	// Load SKILL class
	include_once(THEME_DIR.'functions/classes/skill.class.php');

	// Load CERTS class
	include_once(THEME_DIR.'functions/classes/certs.class.php');

	// Change Yoast SEO priority to low
	add_filter('wpseo_metabox_prio', function() { return 'low';});

	// Remove images media links
	add_action('admin_init', function() {
    	$image_set = get_option( 'image_default_link_type' );
    	if ($image_set !== 'none')
        	update_option('image_default_link_type', 'none');
	}, 10);

	/**
	 * Filter the CSS class for a nav menu based on a condition.
	 *
	 * @param array  $classes The CSS classes that are applied to the menu item's <li> element.
	 * @param object $item    The current menu item.
	 * @return array (maybe) modified nav menu class.
	 */
	function updateNavItemClasses($classes, $item)
	{
		// to be added later - "active" class to the active page
		$classes[] = "nav-item";
		return $classes;
	}
	add_filter('nav_menu_css_class' , 'updateNavItemClasses' , 10, 2);

	/**
	 * Add custom class to menu anchor tags
	 */
	function updateNavItemAnchorClasses($item_output, $item, $depth, $args)
	{
		$item_output = preg_replace('/<a /', '<a class="nav-link" ', $item_output, 1);
		return $item_output;
	}
	add_filter('walker_nav_menu_start_el', 'updateNavItemAnchorClasses', 10, 4);

	/**
	 * Set custom excerpt length
	 * @param  int $length Excerpt length
	 * @return int         New excerpt length
	 */
	function secExcerptLength($length)
	{
		return 20;
	}
	add_filter('excerpt_length', 'secExcerptLength', 999);

?>
