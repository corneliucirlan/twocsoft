<?php

	/*
	 * REMOVE COMMENTS ICON FROM ADMINBAR
	 */
	add_action('wp_before_admin_bar_render', function() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('comments');
	});

	// Disable support for comments and trackbacks in post types
	function df_disable_comments_post_types_support() {
		$post_types = get_post_types();
		foreach ($post_types as $post_type) {
			if(post_type_supports($post_type, 'comments')) {
				remove_post_type_support($post_type, 'comments');
				//remove_post_type_support($post_type, 'trackbacks');
			}
		}
	}
	add_action('admin_init', 'df_disable_comments_post_types_support');

	// Close comments on the front-end
	function df_disable_comments_status() {
		return false;
	}
	add_filter('comments_open', 'df_disable_comments_status', 20, 2);
	add_filter('pings_open', 'df_disable_comments_status', 20, 2);

	// Hide existing comments
	function df_disable_comments_hide_existing_comments($comments) {
		$comments = array();
		return $comments;
	}
	add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

	// Remove comments page in menu
	function df_disable_comments_admin_menu() {
		remove_menu_page('edit-comments.php');
	}
	add_action('admin_menu', 'df_disable_comments_admin_menu');

	// Redirect any user trying to access comments page
	function df_disable_comments_admin_menu_redirect() {
		global $pagenow;
		if ($pagenow === 'edit-comments.php') {
			wp_redirect(admin_url()); exit;
		}
	}
	add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

	// Remove comments metabox from dashboard
	function df_disable_comments_dashboard() {
		remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
	}
	add_action('admin_init', 'df_disable_comments_dashboard');

	// Remove comments links from admin bar
	function df_disable_comments_admin_bar() {
		if (is_admin_bar_showing()) {
			remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
		}
	}
	add_action('init', 'df_disable_comments_admin_bar');

	/**
	 * REMOVE VERSION NUMBER
	 */
	remove_action('wp_head', 'wp_generator');


	/**
	 * REMOVE RELATIONAL LINKS
	 */
	remove_action('wp_head', 'start_post_rel_link', 10, 0 );
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


	/**
	 * REMOVE THE "WLW Manifest File"
	 */
	remove_action( 'wp_head', 'wlwmanifest_link');


	/**
	 * REMOVE EditURL
	 */
	remove_action('wp_head', 'rsd_link');


	/**
	 * REMOVE RSS FEED
	 */
	remove_action( 'wp_head', 'feed_links_extra', 3 );


	/**
	 * REMOVE SHORTLINK
	 */
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

	/**
	 * REMOVE wp.getUsersBlogs - SECURITY
	 */
	add_filter('xmlrpc_methods', 'Remove_Unneeded_XMLRPC');
	function Remove_Unneeded_XMLRPC( $methods ) {
		unset( $methods['wp.getUsersBlogs'] );
		return $methods;
	}

?>