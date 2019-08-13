<?php

	/**
	 * Front page template file
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package cornelius
	 */

	// Security check
	if (!defined('ABSPATH')) exit;

	// Get all custom fields
	$services = get_fields();

?>

<?php get_header(); ?>


<section class="home-services row">
	<?php for ($counter = 1; $counter <= 5; $counter++): ?>
		<article class="home-service col">
			<i class="service-icon fa-4x fa-<?php echo $services['home_service_icon_'.$counter] ?>"></i>
			<h4 class="service-title"><?php echo $services['home_service_title_'.$counter] ?></h4>
			<p class="service-text"><?php echo $services['home_service_text_'.$counter] ?></p>
		</article>
	<?php endfor; ?>
</section>

<h2 class="home-blog"><?php _e('Latest blog entries', 'cornelius') ?></h2>
<section class="latest-posts row">

	<?php $latestBlogEntries = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 4)); ?>

	<?php if ($latestBlogEntries->have_posts()): ?>

		<?php while ($latestBlogEntries->have_posts()): $latestBlogEntries->the_post(); ?>

			<article class="latest-post col-xs-12 col-md-6 col-lg-3">
				<a aria-label="Read more on <?php the_title() ?>" href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail') ?></a>
				<a aria-label="Read more on <?php the_title() ?>" href="<?php the_permalink() ?>"><h4 class="latest-title"><?php the_title() ?></h4></a>
			</article>

		<?php endwhile; ?>

	<?php endif; ?>
</section>

<?php get_footer(); ?>
