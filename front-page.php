<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

<?php get_header() ?>

<!-- SERVICES -->
<h2 style="text-align: center;">Services</h2>

<div class="md-flat-card">
	<a href="<?php echo get_permalink(PAGE_SERVICES); ?>">
		<?php for ($row = 1; $row <= 2; $row++): ?>
			<?php for ($col = 1; $col <= 3; $col++): ?>
				<div class="homepage-article col-md-4"><?php the_field('box-'.$row.'-'.$col) ?></div>
			<?php endfor; ?>
		<?php endfor; ?>
	</a>
</div>

<?php get_footer() ?>