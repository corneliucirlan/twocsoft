<?php

    /**
     * Template part for displaying Portfolio page
     *
     * @link https://codex.wordpress.org/Template_Hierarchy
     *
     * @package ccwp
     */


    // Security check
    if (!defined('ABSPATH')) die;

    // Query portfolio posts
    query_posts(array('post_type' => POST_TYPE_PORTFOLIO));

?>

<main class="page-portfolio cards row">
    <?php if (have_posts()): ?>
		<?php while (have_posts()): the_post() ?>
            <div class="card-wrapper col-xs-12 col-md-4">
                <?php get_template_part('templates/content', 'card'); ?>
            </div>
		<?php endwhile; ?>
	<?php endif; ?>
</main>
