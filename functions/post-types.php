<?php

	// Include CC_CPT Class
	include_once(THEME_DIR.'libs/cc-cpt.php');

	// Re-register default post type to change slug
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

	// Register Portfolio post type
	$portfolio = new CC_CPT(array(
		'post_type_name'	=> POST_TYPE_PORTFOLIO,
		'singular'			=> 'Portfolio',
		'plural'			=> 'Portfolio',
		'slug'				=> POST_TYPE_PORTFOLIO
	), array('has_archive' => false, 'menu_position' => 5));
	$portfolio->register_taxonomy('type');
	$portfolio->register_taxonomy('post_tag');

?>