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
		
		// project page
		//if (is_single()) wp_enqueue_style('project', get_template_directory_uri().'/css/project.css', array('main-style'), TCS_VERSION, 'all');

		// font awesome
		wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), FONT_AWESOME, 'all');


		/**
		 * Scripts
		 */

		// jQuery - the right way
		/*wp_deregister_script('jquery');
		wp_register_script('jquery', get_bloginfo('url').'/wp-includes/js/jquery/jquery.js', '', '1.11.1', false);*/
		wp_enqueue_script('jquery');

		// Masonry
		wp_enqueue_script('masonry');
		
		// actions
		wp_enqueue_script('actions', get_template_directory_uri().'/js/actions.js', array('jquery'), TCS_VERSION, true);

		// mobile menu
		wp_enqueue_script('mdmenu', get_template_directory_uri().'/js/jquery.mdmenu.js', array('jquery'), MDMENU_VERSION, true);
	});

?>