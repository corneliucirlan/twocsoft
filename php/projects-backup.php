<?php
	global $the_query;
	$args = array(
		'numberposts' => -1,
		'post_type' => 'post',
	);
	$the_query = new WP_Query($args);

	function printProjects($category)
		{
			global $the_query;
			
			if ($the_query->have_posts()):
				$size = 'medium';
				$detect = new Mobile_Detect();
				if ($detect->isMobile() && !$detect->isTablet()) $size = 'thumbnail';
					elseif ($detect->isTablet()) $size = 'medium';
								
				while ($the_query->have_posts()):
					$the_query->the_post();
					if (strtolower(get_field('project_type')) == $category):
						$image = wp_get_attachment_image_src(get_post_thumbnail_id(), $size);
						?>
						<section class="row">
							<div class="card col-md-10 col-center">
								<h2 class="row-title"><?php the_title() ?></h2>
								<div class="col-md-6">
									<img src="<?php echo $image[0] ?>" alt="<?php the_title() ?>" />
								</div>
								<div class="col-md-6">
									<?php
										$content = get_the_content();
										$content = "<p>".$content."</p>";
										echo $content;
									?>
									<a href="<?php the_permalink() ?>" class="btn btn-primary">View Details</a>
									<a href="<?php echo get_field('project_url') ?>" target="_blank" class="btn btn-primary">View Live</a>
								</div>
							</div>
						</section>
						<?php
					endif;
				endwhile;
				rewind_posts();
			endif;
		}
?>
					

<div id="projects" class="row">
	<ul class="nav nav-tabs">
		<li role="presentation" class="active"><a href="#webistes">Websites</a></li>
		<li role="presentation"><a href="#plugin">Plugins</a></li>
	</ul>

	<div id="webistes" class="projects-tab show">
		<?php printProjects('website') ?>
	</div>
	<div id="plugin" class="projects-tab hidden">
		<?php printProjects('plugin'); ?>
	</div>
</div>

	
					