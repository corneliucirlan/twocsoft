<?php get_header(); ?>

<?php

	// SECURITY CHECK
	if (!defined('ABSPATH')) exit;


	$args = array(
			'post_type'			=> 'post',
			'post_status' 		=> 'publish',
			'order'				=> 'DESC',
			'posts_per_page'	=> 2,
		);
		$blogPosts = new WP_Query($args);
?>

<?php if ($blogPosts->have_posts()): ?>
	<div class="blog-posts row">
		<main class="md-card-holder col-md-8">
			<?php while ($blogPosts->have_posts()): $blogPosts->the_post() ?>
				<div class="md-card md-shadow-2dp">
					<div class="md-card-header">
						<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
						<?php displayBlogPostDetails() ?>
					</div>
					<div class="md-card-body">
						<p><?php the_post_thumbnail(getPhotoSize()); ?></p>
						<?php the_excerpt() ?>
					</div>
				</div>
			<?php endwhile; ?>
		</main>

		<!-- <aside class="md-card-holder col-md-4">
			<div class="md-card md-shadow-2dp"><?php displayRecentPosts(CATEGORY_BLOG) ?></div>
		</aside> -->
	</div>
<?php endif; ?>

<?php get_footer(); ?>