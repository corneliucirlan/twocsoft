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
			$size = 'medium';
			$detect = new Mobile_Detect();
			if ($detect->isMobile() && !$detect->isTablet()) $size = 'thumbnail';
				elseif ($detect->isTablet()) $size = 'medium';

			while ($the_query->have_posts()):
				$the_query->the_post();
				?>
				<div class="md-card-holder col-md-6">
					<div class="md-card md-shadow-2dp">
						<div class="md-card-header">
							<h2><?php the_title() ?></h2>
						</div>
						<div class="md-card-body">
							<p><?php the_post_thumbnail(getPhotoSize()) ?></p>
							<?php the_excerpt() ?>
						</div>
						<div class="md-card-footer">
							<a href="<?php the_permalink() ?>" target="_self" class="btn btn-primary">Details</a>
							<a href="<?php echo get_field('project-url') ?>" target="_blank" class="btn btn-primary">Live Version</a>
						</div>
					</div>
				</div>
				<?php
			endwhile;
			rewind_posts();
		endif;
	?>
<main>

	
					