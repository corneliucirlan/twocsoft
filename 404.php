<?php

	/**
	 * 404 Template file
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package ccwp
	 */

	// Security check
	if (!defined('ABSPATH')) die;

?>

<?php get_header() ?>

<p><?php _e("Something went wrong, this page doesn't exist"); ?></p>

<?php get_footer() ?>
