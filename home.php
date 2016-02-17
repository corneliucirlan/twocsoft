<?php

	// Security check
	if (!defined('ABSPATH')) die;

?>

<?php get_header(); ?>

<?php

	// SECURITY CHECK
	if (!defined('ABSPATH')) exit;


	$args = array(
		'post_type'			=> array('post'),
		'post_status' 		=> 'publish',
		'order'				=> 'DESC',
		'posts_per_page'	=> get_option('posts_per_page')/5,
	);
	$blogPosts = new WP_Query($args);
?>

<div class="row">
	<?php if ($blogPosts->have_posts()): ?>
		<main class="blog-posts col-md-8">
			<?php while ($blogPosts->have_posts()): $blogPosts->the_post() ?>
				<div class="md-card-holder">
					<div class="md-card md-shadow-2dp">
						<div class="md-card-header">
							<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
							<?php displayBlogPostDetails(true) ?>
						</div>
						<div class="md-card-body">
							<p><?php the_post_thumbnail(getPhotoSize()); ?></p>
							<?php the_excerpt() ?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</main>
		<?php next_posts_link('Older Posts'); ?>
		<?php previous_posts_link('Newer Posts'); ?>

			<!-- <aside class="md-card-holder col-md-4">
				<div class="md-card md-shadow-2dp"><?php displayRecentPosts(CATEGORY_BLOG) ?></div>
			</aside> -->
	<?php endif; ?>
</div>

<?php get_footer(); ?>