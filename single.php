<?php

	// SECURITY CHECK
	if (!defined('ABSPATH')) exit;

	the_post();
?>


<?php get_header(); ?>

<?php
	
	switch (get_post_type($post)):
		
		// WEBSITE POST
		case POST_TYPE_WEBSITE: get_template_part('php/templates/post-website'); break;
		
		// PLUGIN POST
		case POST_TYPE_PLUGIN: get_template_part('php/templates/post-plugin'); break;

		// DEFAULT - BLOG POST
		default: get_template_part('php/templates/post-blog'); break;
	endswitch;

?>

<?php get_footer(); ?>