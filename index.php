<?php

	/**
	 * Default template file
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package ccwp
	 */

	// Security check
	if (!defined('ABSPATH')) exit;

?>

<?php get_header(); ?>


<main class="site-main row" role="main">
    <?php
        if (have_posts()):

                // Start the Loop
                while (have_posts()):
                    the_post();
					?><div class="col-12"><?php get_template_part('templates/content', 'card'); ?></div><?php
                endwhile;
            else:
                get_template_part('templates/content', 'none');
        endif;
    ?>
</main>

<?php get_footer(); ?>
