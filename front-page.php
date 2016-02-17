<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

<?php get_header() ?>

<!-- SERVICES -->
<h2 style="text-align: center;">Services</h2>

<a href="<?php echo get_permalink(PAGE_SERVICES); ?>">
	<?php for ($row = 1; $row <= 2; $row++): ?>
		<article class="row">
			<?php for ($col = 1; $col <= 3; $col++): ?>
				<div class="homepage-article col-md-4"><?php the_field('box-'.$row.'-'.$col) ?></div>
			<?php endfor; ?>
		</article>
	<?php endfor; ?>
</a>

<?php get_footer() ?>