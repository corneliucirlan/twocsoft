<?php

	// Security check
	if (!defined('ABSPATH')) die;

	the_post();
?>

<?php get_header(); ?>

<?php

	get_template_part('templates/single-website');

	//switch (get_field('portfolio-type')):

	//	// website
	//	case 'portfolio-website': get_template_part('templates/single-website'); break;

	//	// plugin
	//	case 'portfolio-plugin': get_template_part('templates/single-plugin'); break;

	//endswitch;

?>

<?php get_footer(); ?>
