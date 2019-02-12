<?php

	/**
	 * Default page template file
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package cornelius
	 */

	// Security check
	if (!defined('ABSPATH')) exit;

?>

<?php get_header(); ?>

<?php
	switch (get_the_id()):

		// Projects page
		case PAGE_PORTFOLIO: get_template_part('templates/page', 'portfolio'); break;

		// About page
		case PAGE_ABOUT: get_template_part('templates/page', 'about'); break;

		// Contact page
		case PAGE_CONTACT: get_template_part('templates/page', 'contact'); break;

		// Services page
		case PAGE_SERVICES: get_template_part('templates/page', 'services'); break;

		// Default page
		default: get_template_part('templates/content', 'generic'); break;
	endswitch;
?>

<?php get_footer(); ?>
