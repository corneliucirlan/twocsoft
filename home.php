<?php

	// Security check
	if (!defined('ABSPATH')) die;

?>

<?php get_header(); ?>

<?php

	$cardSettings = array(
		'containerClass'		=> '',
		'showCardDetails'		=> true,

		'showFooterShare'		=> false,
		'footerShareSettings'	=> array('id' => get_the_id(), 'alignRight' => true),
	);

	$args = array(
		'post_type'			=> array('post'),
		'post_status' 		=> 'publish',
		'order'				=> 'DESC',
		'posts_per_page'	=> get_option('posts_per_page'),
	);
	query_posts($args);
?>

<div class="row">
	<?php if (have_posts()): ?>
		<main class="blog-posts col-md-8">
			<?php while (have_posts()): the_post() ?>
				<?php displayCard($cardSettings) ?>
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