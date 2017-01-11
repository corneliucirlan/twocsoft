<?php

	// Security check
	if (!defined('ABSPATH')) die;

	the_post();
?>

<?php

	$cardSettings = array(
		'cardWrapper'			=> 'col-xs-12',
	);

?>


<?php get_header(); ?>

<div class="page-single row">
	<main class="col-xs-12 col-md-8 no-gutter">
		<?php renderCard($cardSettings) ?>
	</main>

	<?php get_sidebar() ?>
</div>

<?php get_footer(); ?>
