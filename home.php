<?php

	/**
	 * Home template file
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package ccwp
	 */

	// Security check
	if (!defined('ABSPATH')) exit;

?>

<?php get_header(); ?>


<main class="site-main cards row" role="main">
    <?php

		// Check if posts available
        if (have_posts()):

                // Start the Loop
                while (have_posts()):
                    the_post();
					?><div class="card-wrapper col-xs-12 col-md-4"><?php
						get_template_part('templates/content', 'card');
					?></div><?php
                endwhile;
            else:
                get_template_part('templates/content', 'none');
        endif;
    ?>
</main>

<?php get_footer(); ?>
