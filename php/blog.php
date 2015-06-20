<?php

	// SECURITY CHECK
	if (!defined('ABSPATH')) exit;


	$args = array(
			'post_type'			=> 'post',
			'post_status' 		=> 'publish',
			'order'				=> 'DESC',
			'category__in'		=> CATEGORY_BLOG,
			'post__not_in'		=> array(get_the_id()),
			'posts_per_page'	=> 1,
		);
		$blogPosts = new WP_Query($args);
?>

<?php if ($blogPosts->have_posts()): ?>
	<div class="col-md-10 col-md-offset-1">
		<div class="row">
			<div class="blog-posts col-md-8">
				<?php while ($blogPosts->have_posts()): $blogPosts->the_post() ?>
					<div class="blog-post">
						<div class="card">
							<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
							<?php displayBlogPostDetails() ?>
							<?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'medium') ?>
							<?php the_excerpt() ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>

			<div class="col-md-4">
				<div class="card"><?php displayRecentPosts(CATEGORY_BLOG) ?></div>
			</div>
		</div>
	</div>
<?php endif;