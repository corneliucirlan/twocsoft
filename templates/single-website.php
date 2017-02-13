<?php

	// Security check
	if (!defined('ABSPATH')) die;

?>


<main class="single-website card card-block">
	<h1 class="card-title"><?php the_title() ?></h1>

	<div class="row">
		<div class="single-website-previews col-md">
			<?php for ($x = 1; $x <= 5; $x++): ?>
				<?= ($image = wp_get_attachment_image(get_field('website-image-'.$x), 'medium')) ? $image : ""; ?>
			<?php endfor; ?>
		</div>
		<div class="single-website-description col-md">
			<?php the_content() ?>
			<a class="btn btn-primary-outline" href="<?= the_field('website-uri') ?>" target="_blank">Visit Live Version</a>
		</div>
	</div>
</main>
