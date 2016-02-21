<?php

	// Security check
	if (!defined('ABSPATH')) die;

?>

<main class="md-card-holder">
	<h1><?php the_title() ?></h1>
	<p style="padding: 1rem 0;"><?php the_post_thumbnail('large'); ?></p>

	<div class="project-description row">
		<div class="project-description-left col-md-8">
			<?php the_content() ?>
		</div>
		<div class="project-description-right col-md-4">
			<h2>Services provided</h2>
			<ul class="provided-services">
				<?php
					$services = get_field('website-services');
					foreach ($services as $service)
						switch ($service):
							case "website-design": echo '<li><i class="fa fa-check"></i> Website Design</li>'; break;
							case "front-end-development": echo '<li><i class="fa fa-check"></i> Front-end Development</li>'; break;
							case "back-end-development": echo '<li><i class="fa fa-check"></i> Back-end Development</li>'; break;
							case "search-engine-optimization": echo '<li><i class="fa fa-check"></i> Search Engine Optimization</li>'; break;
							case "plugin-development": echo '<li><i class="fa fa-check"></i> Plugin Development</li>'; break;
						endswitch;
				?>
			</ul>
			<h2><a href="<?php the_field('project-url') ?>" target="_blank">Live Version</a></h2>
		</div>
	</div>
</main>