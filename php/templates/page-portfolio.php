<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

<main class="md-cards-holder row">
	<?php
		global $post;
		//global $the_query;
		
		$args = array(
			'numberposts' 	=> -1,
			'post_type' 	=> POST_TYPE_PORTFOLIO,
			'post_tatus'	=> 'publish',
		);
		$the_query = new WP_Query($args);
		
		if ($the_query->have_posts()):
			while ($the_query->have_posts()):
				$the_query->the_post();
				?>
				<div class="md-card-holder col-md-6">
					<div class="md-card md-shadow-2dp">
						<div class="md-card-header">
							<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
						</div>
						<div class="md-card-body">
							<p><?php the_post_thumbnail(getPhotoSize()) ?></p>
							<?php the_excerpt() ?>
						</div>
						<div class="md-card-footer row">
							<div class="col-md-6">
								<a href="<?php the_permalink() ?>" target="_self" class="btn btn-primary">Details</a>
								<?php if (get_field('portfolio-type') == PORTFOLIO_WEBSITE): ?><a href="<?php echo get_field('project-url') ?>" target="_blank" class="btn btn-primary">Live Version</a><?php endif; ?>
							</div>
							<div class="item-footer-social col-md-6">
								<?php displayShareButtons(array('id' => get_the_id(), 'alignRight' => true)) ?>
							</div>
						</div>
					</div>
				</div>
				<?php
			endwhile;
			rewind_posts();
		endif;
	?>
<main>

	
					