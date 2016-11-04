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
	<?php renderCard($cardSettings) ?>
</div>

<?php get_footer(); ?>
