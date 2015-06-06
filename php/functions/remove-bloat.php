<?php

	/*
	 * Remove Adminbar Comments icon
	 */
	add_action('wp_before_admin_bar_render', function() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('comments');
	});

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
	remove_action('wp_head', 'wlwmanifest_link');

	/**
	 * REMOVE EditURL
	 */
	remove_action('wp_head', 'rsd_link');

	/**
	 * REMOVE RSS FEED
	 */
	remove_action('wp_head', 'feed_links_extra', 3);

	/**
	 * REMOVE SHORTLINK
	 */
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

?>