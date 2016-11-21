<?php

	// Security check
	if (!defined('ABSPATH')) die;

	the_post();
?>

<?php

	$cardSettings = array(
		'cardWrapper'			=> '',
	);

?>


<?php get_header(); ?>

<div class="page-single row">
	<main class="col-md-8">
		<?php renderCard($cardSettings) ?>
	</main>

	<?php get_sidebar() ?>
</div>

<?php get_footer(); ?>
