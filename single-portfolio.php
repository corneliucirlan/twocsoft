<?php

	// Security check
	if (!defined('ABSPATH')) die;

	the_post();
?>

<?php get_header(); ?>

<?php

	switch (get_field('portfolio-type')):

		// website
		case 'portfolio-website': get_template_part('templates/portfolio-website'); break;

		// plugin
		case 'portfolio-generic': get_template_part('templates/portfolio-generic'); break;

	endswitch;

?>

<?php get_footer(); ?>
