<?php

	// Security check
	if (!defined('ABSPATH')) die;

?>

<?php get_header() ?>

<?php

	$cardSettings = array(
		'cardWrapper'		=> 'col-xs-12 col-sm-6 col-md-6 col-lg-4',
		'showCardDetails'		=> true,
		'isCategory' 			=> is_category() ? true : false,
		'isTag'					=> is_tag() ? true : false,

		'showFooterShare'		=> true,
		'footerShareSettings'	=> array('id' => get_the_id(), 'alignRight' => true),
	);

?>

<main class="masonry-elements row">

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
