<?php

	/**
	 * Home template file
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package cornelius
	 */

	// Security check
	if (!defined('ABSPATH')) exit;

?>

<?php get_header(); ?>

<main class="row">
	<?php

		// Check if posts available
        if (have_posts()):

                // Start the Loop
                while (have_posts()):
					the_post();
					?><div class="card-container col-12 col-md-8 offset-md-2"><?php
						get_template_part('templates/article', 'card');
					?></div><?php
                endwhile;
            else:
                get_template_part('templates/content', 'none');
        endif;
    ?>
</main>

<?php get_footer(); ?>
