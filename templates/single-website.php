<?php

	// Security check
	if (!defined('ABSPATH')) die;

?>

<main class="single-website card card-flat card-block">
	<h1 class="card-title"><?php the_title() ?></h1>

	<div class="col-md-6">
		<?php the_post_thumbnail(getPhotoSize()); ?>
	</div>
	<div class="col-md-6">
		<?php the_content() ?>
		<h2><a href="<?php the_field('website-url') ?>" target="_blank">Live Version</a></h2>
	</div>
</main>
