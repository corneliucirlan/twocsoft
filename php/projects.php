<div class="col-md-10 col-md-offset-1">
	<div class="projects row">
		<?php
			global $post;
			//global $the_query;
			
			$args = array(
				'numberposts' 	=> -1,
				'post_type' 	=> array(POST_TYPE_WEBSITE, POST_TYPE_PLUGIN),
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
					<div class="project col-md-6">
						<div class="card">
							<h2 class="row-title"><?php the_title() ?></h2>
							<div class="col-md-12">
								<?php echo wp_get_attachment_image(get_post_thumbnail_id(), $size) ?>
								<?php echo "<p>".get_the_content()."</p>"; ?>
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
	</div>
</div>

	
					