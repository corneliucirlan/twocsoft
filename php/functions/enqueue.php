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
		wp_enqueue_style('bootstrap', TCS_URI.'/css/bootstrap.min.css', '', BOOTSTRAP_VERSION, 'all');

		// main stylesheet
		wp_enqueue_style('main-style', TCS_URI.'/style.css', array('bootstrap'), TCS_VERSION, 'all');

		// pages
		wp_enqueue_style('pages', TCS_URI.'/css/pages.css', array('main-style'), TCS_VERSION, 'all');

		// material design mobile menu
		wp_enqueue_style('mdmenu', TCS_URI.'/css/jquery.mdmenu.css', array('main-style'), MDMENU_VERSION, 'all');
		
		// font awesome
		wp_enqueue_style('font-awesome', TCS_URI.'/css/font-awesome.min.css', array(), FONT_AWESOME, 'all');


		/**
		 * JS SCRIPTS
		 */

		// jQuery
		wp_enqueue_script('jquery');

		// Masonry
		wp_enqueue_script('masonry');

		// actions
		wp_enqueue_script('actions', TCS_URI.'/js/actions.js', array('jquery'), TCS_VERSION, true);

		// mobile menu
		wp_enqueue_script('mdmenu', TCS_URI.'/js/jquery.mdmenu.js', array('jquery'), MDMENU_VERSION, true);

		// images loaded
		wp_enqueue_script('images-loaded', TCS_URI.'/js/imagesloaded.pkgd.min.js', array('jquery'), IMAGES_LOADED_VERSION, true);


		// LOCALIZE WPPC AJAX HANDLER
		wp_localize_script('actions', 'TCSAjax', array(
			'ajaxurl' => get_bloginfo('wpurl').'/wp-admin/admin-ajax.php',
			'action' => 'submit-form',
		));
	});


	/**
	 * FOOTER
	 */
	add_action('wp_footer', function() {
		?>
		<?php
	});

?>