<?php

	/**
	 * Single post template file
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package ccwp
	 */

	// Security check
	if (!defined('ABSPATH')) exit;

?>

<?php get_header(); ?>

<main class="row">
	<div class="col-xs-12 col-md-8 offset-md-2">
		<?php get_template_part('templates/article') ?>
	</div>
</main>

<?php get_footer(); ?>
