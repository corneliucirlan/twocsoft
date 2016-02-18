<?php

	// Security check
	if (!defined('ABSPATH')) die;

	the_post();
?>


<?php get_header(); ?>

<div class="row">
	<main class="blog-post-main md-card-holder col-md-8">
		<div class="md-card md-shadow-2dp">
			<div class="md-card-header">
				<h1><?php the_title(); ?></h1>
				<?php displayBlogPostDetails(true) ?>
			</div>
			<div class="md-card-body">
				<?php the_post_thumbnail(getPhotoSize()); ?>
				<?php the_content() ?>
			</div>
			<div class="md-card-footer">
				<?php renderShareButtons(array('id' => get_the_id())) ?>
				<?php previous_post_link() ?>
				<?php next_post_link() ?>
			</div>
		</div>
	</main>
	<!-- <aside class="blog-post-aside md-card-holder col-md-4">
		<div class="md-card md-shadow-2dp">
			<?php displayRecentPosts(CATEGORY_BLOG, 5) ?>
		</div>
	</aside> -->
</div>

<?php get_footer(); ?>