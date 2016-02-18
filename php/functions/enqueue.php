<?php

	/**
	 * WP HEAD
	 */
	add_action('wp_head', function() {
		?>
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/img/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/img/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img/favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
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

		// material design mobile menu
		wp_enqueue_style('mdmenu', get_template_directory_uri().'/css/jquery.mdmenu.css', array('main-style'), MDMENU_VERSION, 'all');
		
		
		// singular blog post
		if (is_singular('post'))
			wp_enqueue_style('blog-post', get_template_directory_uri().'/css/blog-post.css', array('main-style'), TCS_VERSION, 'all');

		/**
		 * JS SCRIPTS
		 */

		// jQuery
		wp_enqueue_script('jquery');

		// Masonry
		wp_enqueue_script('masonry');

		// actions
		wp_enqueue_script('actions', get_template_directory_uri().'/js/actions.js', array('jquery'), TCS_VERSION, true);

		// mobile menu
		wp_enqueue_script('mdmenu', get_template_directory_uri().'/js/jquery.mdmenu.js', array('jquery'), MDMENU_VERSION, true);

		// images loaded
		wp_enqueue_script('images-loaded', get_template_directory_uri().'/js/imagesloaded.pkgd.min.js', array('jquery'), IMAGES_LOADED_VERSION, true);


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

		// PrismJS for code highlighting
		if (is_singular()):
			wp_enqueue_style('prismjs', get_template_directory_uri().'/css/prism.css', '', TCS_VERSION, 'all');
			wp_enqueue_script('prism-js', get_template_directory_uri().'/js/prism.js', '', TCS_VERSION, true);
		endif;

		// font awesome
		wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array(), FONT_AWESOME, 'all');
	});

?>