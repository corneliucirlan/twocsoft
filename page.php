<?php get_header(); ?>

<?php
	switch (get_the_id()):
					
		/**
		 * PROJECTS PAGE
		 */
		case PAGE_PROJECTS: get_template_part('php/templates/page-projects'); break;

		/**
		 * ABOUT US PAGE
		 */
		case PAGE_ABOUT_US: get_template_part('php/templates/page-about-us'); break;

		/**
		 * CONTACT PAGE
		 */
		case PAGE_CONTACT: get_template_part('php/templates/page-contact'); break;

		/**
		 * SOLUTIONS PAGE
		 */
		case PAGE_SOLUTIONS: get_template_part('php/templates/page-solutions'); break;

		/**
		 * SERVICES PAGE
		 */
		case PAGE_SERVICES: get_template_part('php/templates/page-services'); break;

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