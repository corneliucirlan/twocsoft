<?php

	// Security check
	if (!defined('ABSPATH')) die;

?>

<?php get_header(); ?>

<?php

	$cardSettings = array(
		'cardWrapper'			=> 'col-xs-12 col-sm-6 col-lg-4',

		'blogPost'				=> true,
	);

	// Query blog posts
	$args = array(
		'post_type'			=> array('post'),
		'post_status' 		=> 'publish',
		'order'				=> 'DESC',
		'posts_per_page'	=> get_option('posts_per_page'),
	);
	query_posts($args);

	// Nuumber of published posts
	$publishedPosts = wp_count_posts()->publish;

	switch ($publishedPosts):
		case 1: $cardSettings['cardWrapper'] = 'col-xs-12 col-sm-6 offset-sm-3 col-lg-4 offset-lg-4'; break;
		case 2: $cardSettings['cardWrapper'] = 'col-xs-12 col-sm-6';
		default: break;
	endswitch;

?>

<main class="page-blog cards row">
	<?php if (have_posts()): ?>
		<?php while (have_posts()): the_post(); ?>
			<?php renderCard($cardSettings); ?>
		<?php endwhile; ?>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
