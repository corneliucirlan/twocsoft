<?php

	// SECURITY CHECK
	if (!defined('ABSPATH')) exit;

?>

<div class="col-md-8 col-md-offset-2">
	<?php echo wp_get_attachment_image(get_post_thumbnail_id(), $size) ?>

	<div class="project-description row">
		<div class="project-description-left col-md-8">
			<?php the_content() ?>
			<!-- <div class="share-website">
				<h2>Share this website</h2>
				<i class="fa fa-facebook-square fa-2x"></i>
				<i class="fa fa-google-plus-square fa-2x"></i>
				<i class="fa fa-twitter-square fa-2x"></i>
				<i class="fa fa-linkedin-square fa-2x"></i>
			</div> -->
		</div>
		<div class="project-description-right col-md-4">
			<h2>Services provided</h2>
			<ul class="provided-services">
				<?php
					$services = get_field('project-services');
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
</div>