<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

<div class="card card-flat card-block">

	<h1 class="card-title"><?php the_title() ?></h1>
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

	<!-- Usage -->
	<?php if (get_field('plugin-usage')): ?>
		<h2>Usage</h2>
		<?php the_field('plugin-usage') ?>
	<?php endif; ?>

</div>
