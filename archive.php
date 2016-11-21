<?php

	// Security check
	if (!defined('ABSPATH')) die;

?>

<?php get_header() ?>

<?php

	$cardSettings = array(
		'cardWrapper'			=> 'col-xs-12 col-sm-6 col-lg-4',

		'blogPost'				=> true,
	);

?>

<main class="page-archive cards row">

	<?php if (have_posts()): ?>
			<?php while (have_posts()): ?>
				<?php the_post() ?>
				<?php renderCard($cardSettings); ?>
			<?php endwhile; ?>
		<?php else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>

</main>

<?php get_footer() ?>
