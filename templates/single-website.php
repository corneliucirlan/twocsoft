<?php

	// Security check
	if (!defined('ABSPATH')) die;

?>

<div class="single-website card card-flat card-block">
	<h1 class="card-title"><?php the_title() ?></h1>

	<div class="col-md-6">
		<?php the_post_thumbnail(getPhotoSize()); ?>
	</div>
	<div class="col-md-6">
		<?php the_content() ?>
		<h2>Services</h2>
		<ul class="services">
			<?php
				$services = get_field('website-services');
			 	foreach ($services as $service):
					switch ($service):
						case "website-design": echo '<li><i class="fa fa-check"></i> Website Design</li>'; break;
						case "front-end-development": echo '<li><i class="fa fa-check"></i> Front-end Development</li>'; break;
						case "back-end-development": echo '<li><i class="fa fa-check"></i> Back-end Development</li>'; break;
						case "search-engine-optimization": echo '<li><i class="fa fa-check"></i> Search Engine Optimization</li>'; break;
						case "plugin-development": echo '<li><i class="fa fa-check"></i> Plugin Development</li>'; break;
					endswitch;
				endforeach;
			?>
		</ul>
		<h2><a href="<?php the_field('website-url') ?>" target="_blank">Live Version</a></h2>
	</div>





	<!-- <div class="project-description row"> -->
		<!-- <div class="project-description-right col m4"> -->
		<!-- </div> -->
	<!-- </div> -->
</div>
