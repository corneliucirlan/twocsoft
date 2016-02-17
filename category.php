<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

<?php get_header() ?>

<main class="md-cards-holder row">

<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<div class="md-card-holder col-md-6">
			<div class="md-card md-shadow-2dp">
				<div class="md-card-header">
					<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
					<?php displayBlogPostDetails() ?>
				</div>
				<div class="md-card-body">
					<?php the_excerpt() ?>
				</div>
				<div class="md-card-footer">
					<?php renderShareButtons() ?>
				</div>
			</div>
		</div>
	<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
</main>

<?php get_footer() ?>