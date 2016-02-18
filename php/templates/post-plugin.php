<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

<main class="md-card-holder">
	<h1><?php the_title() ?></h1>
	<?php the_content() ?>

	<!-- Requirements -->
	<?php if (get_field('plugin-requirements')): ?>
		<h2>Requirements</h2>
		<?php the_field('plugin-requirements') ?>
	<?php endif; ?>

	<!-- Instalation -->
	<?php if (get_field('plugin-instalation')): ?>
		<h2>Instalation</h2>
		<?php the_field('plugin-instalation') ?>
	<?php endif; ?>

	<!-- USAGE -->
	<?php if (get_field('plugin-usage')): ?>
		<h2>Usage</h2>
		<?php the_field('plugin-usage') ?>
	<?php endif; ?>
	
</main>