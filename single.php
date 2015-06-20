<?php

	// SECURITY CHECK
	if (!defined('ABSPATH')) exit;

	the_post();
?>


<?php get_header(); ?>

<?php

	$detect = new Mobile_Detect();

	$size = 'large';
	if ($detect->isMobile() && !$detect->isTablet()) $size = 'medium';
		elseif ($detect->isTablet()) $size = 'medium';
?>

<?php
	
	switch (get_field('project-type')):
		
		// BLOG
		case 'blog-post': get_template_part('php/templates/post-blog'); break;
		
		// WEBSITE
		case 'website': get_template_part('php/templates/post-website'); break;
		
		// PLUGIN
		case 'plugin': get_template_part('php/templates/post-plugin'); break;
	endswitch;

?>

<?php get_footer(); ?>