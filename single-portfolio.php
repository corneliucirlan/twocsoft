<?php

	// Security check
	if (!defined('ABSPATH')) die;

	the_post();
?>

<?php get_header(); ?>

<?php

	switch (get_field('portfolio-type')):

		// website
		case 'portfolio-website': get_template_part('php/templates/single-website'); break;

		// plugin
		case 'portfolio-plugin': get_template_part('php/templates/single-plugin'); break;

	endswitch;

?>

<?php get_footer(); ?>