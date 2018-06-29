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

<?php

	// Get the post type
	$postType = get_post_type();

	// Get portfolio post type
	if (POST_TYPE_PORTFOLIO == $postType)
		$portfolioType = get_field('portfolio-type');
?>

<div class="site-main row">

	<!-- Default post type -->
	<?php if ('post' == $postType): ?>
			<main class="col-xs-12 col-md-8 no-gutter">
			    <?php the_post(); ?>
				<?php get_template_part('templates/content'); ?>
			</main>

			<?php get_sidebar(); ?>

	<!-- Portfolio post type -->
	<?php elseif (POST_TYPE_PORTFOLIO == $postType): ?>

			<!-- Portfolio website post -->
			<?php if (PORTFOLIO_WEBSITE == $portfolioType): ?>
					<?php get_template_part('templates/content', 'website'); ?>

				<!-- Portfolio generic post -->
				<?php elseif (PORTFOLIO_GENERIC == $portfolioType): ?>
					<?php get_template_part('templates/content', 'generic'); ?>
			<?php endif; ?>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
