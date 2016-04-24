<?php

	// Security check
	if (!defined('ABSPATH')) die;

?>

<?php get_header(); ?>

<?php
	switch (get_the_id()):
					
		/**
		 * PROJECTS PAGE
		 */
		case PAGE_PORTFOLIO: get_template_part('templates/page-portfolio'); break;

		/**
		 * ABOUT US PAGE
		 */
		case PAGE_ABOUT: get_template_part('templates/page-about-us'); break;

		/**
		 * CONTACT PAGE
		 */
		case PAGE_CONTACT: get_template_part('templates/page-contact'); break;

		/**
		 * SERVICES PAGE
		 */
		case PAGE_SERVICES: get_template_part('templates/page-services'); break;

		/**
		 * DEFAULT CASE
		 */
		default: 
			the_post();
			the_content();
			break;
	endswitch;
?>

<?php get_footer(); ?>