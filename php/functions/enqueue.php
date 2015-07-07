<?php

	/**
	 * WP HEAD
	 */
	add_action('wp_head', function() {
		?>
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/img/favicon.ico" />
		<?php
	});


	/**
	 * LOAD CSS & JS
	 */
	add_action('wp_enqueue_scripts', function() {

		/**
		 * CSS
		 */
		
		// bootstrap framework
		wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', '', BOOTSTRAP_VERSION, 'all');

		// main stylesheet
		wp_enqueue_style('main-style', get_template_directory_uri().'/style.css', array('bootstrap'), TCS_VERSION, 'all');

		// pages
		wp_enqueue_style('pages', get_template_directory_uri().'/css/pages.css', array('main-style'), TCS_VERSION, 'all');

		// material design mobile menu
		wp_enqueue_style('mdmenu', get_template_directory_uri().'/css/jquery.mdmenu.css', array('main-style'), MDMENU_VERSION, 'all');
		
		// font awesome
		wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome.min.css', array(), FONT_AWESOME, 'all');


		/**
		 * Scripts
		 */

		// jQuery
		wp_enqueue_script('jquery');

		// Masonry
		wp_enqueue_script('masonry');

		// jQuery UI Tabs
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-tabs');
		
		// actions
		wp_enqueue_script('actions', get_template_directory_uri().'/js/actions.js', array('jquery'), TCS_VERSION, true);

		// mobile menu
		wp_enqueue_script('mdmenu', get_template_directory_uri().'/js/jquery.mdmenu.js', array('jquery'), MDMENU_VERSION, true);


		// LOCALIZE WPPC AJAX HANDLER
		wp_localize_script('actions', 'TCSAjax', array(
			'ajaxurl' => get_bloginfo('wpurl').'/wp-admin/admin-ajax.php',
			'action' => 'submit-form',
		));
	});

?>