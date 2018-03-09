<?php

	/**
	 * Front page template file
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package ccwp
	 */

	// Security check
	if (!defined('ABSPATH')) exit;

?>

<?php get_header(); ?>


<main class="page-frontpage card-deck-wrapper">
    <div class="card-deck">
        <?php
			query_posts(array('post_type' => 'post', 'posts_per_page' => 1, 'post_status' => 'publish'));
        	the_post();
			get_template_part('templates/content', 'card');

			query_posts(array('post_type' => POST_TYPE_PORTFOLIO, 'posts_per_page' => 1));
        	the_post();
			get_template_part('templates/content', 'card');
		?>
    </div>
</main>

<?php get_footer(); ?>
