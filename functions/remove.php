<?php

	// Remove CSS/JS version
	add_filter('style_loader_src', 'removeCSSJSVersion', 10, 2);
	add_filter('script_loader_src', 'removeCSSJSVersion', 10, 2);
	function removeCSSJSVersion($src)
	{
	    if (strpos($src, '?ver='))
	        $src = remove_query_arg('ver', $src);
	    return $src;
	}

	// Remove version number
	remove_action('wp_head', 'wp_generator');


	// Remove relational links
	remove_action('wp_head', 'start_post_rel_link', 10, 0 );
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


	// Remove the "WLW Manifest File"
	remove_action( 'wp_head', 'wlwmanifest_link');


	// Remove EditURL
	remove_action('wp_head', 'rsd_link');


	// Remove RSS feed
	remove_action( 'wp_head', 'feed_links_extra', 3);


	// Remove shortlink
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0);

	// Remove wp.getUsersBlogs - SECURITY
	add_filter('xmlrpc_methods', 'Remove_Unneeded_XMLRPC');
	function Remove_Unneeded_XMLRPC( $methods ) {
		unset( $methods['wp.getUsersBlogs'] );
		return $methods;
	}

?>