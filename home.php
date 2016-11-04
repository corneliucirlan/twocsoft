<?php

	// Security check
	if (!defined('ABSPATH')) die;

?>

<?php get_header(); ?>

<?php

	$cardSettings = array(
		'cardWrapper'			=> 'col-xs-12 col-sm-6 col-md-6 col-lg-4',

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
?>

<div class="page-blog cards row">
	<?php if (have_posts()): ?>
		<?php while (have_posts()): the_post() ?>
			<?php renderCard($cardSettings) ?>
		<?php endwhile; ?>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
