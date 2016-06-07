<?php

    // Security check
    if (!defined('ABSPATH')) die;

    the_post();

?>

<?php get_header() ?>

<div class="row">
	<div class="col s12 m12 l12">
		<?php the_content() ?>
	</div>
</div>

<div class="row">
	<?php for ($x=1; $x<=3; $x++): ?>
		<div class="frontpage-button col s12 m4 l4">
			<a href="<?php the_field('button-'.$x) ?>" class="waves-effect waves-light btn cc-blue" style="width: 80%;"><?php the_field('button-'.$x.'-text') ?></a>
		</div>
	<?php endfor; ?>
</div>

<?php get_footer() ?>