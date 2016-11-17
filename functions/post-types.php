<?php

	// Include CC_CPT Class
	include_once(THEME_DIR.'libs/cc-cpt.php');

	// Register Portfolio post type
	$portfolio = new CC_CPT(array(
		'post_type_name'	=> POST_TYPE_PORTFOLIO,
		'singular'			=> 'Portfolio',
		'plural'			=> 'Portfolio',
		'slug'				=> POST_TYPE_PORTFOLIO
	), array('has_archive' => false, 'menu_position' => 5));
	//$portfolio->register_taxonomy('type');
	//$portfolio->register_taxonomy('post_tag');

?>
