<?php

	// Security check
	if (!defined('ABSPATH')) die;

	the_post();
?>

<?php

	$cardSettings = array(
		'containerClass'		=> 'col-sm-12 col-md-8',
		'showCardDetails'		=> true,
		'isSingle'				=> true,
		'showFooterShare'		=> false,
		'footerShareSettings'	=> array('id' => get_the_id(), 'alignRight' => true),
	);

?>


<?php get_header(); ?>

<div class="page-single row">
	<div class="col-md-8">
		<?php displayCard($cardSettings) ?>
	</div>
</div>

<?php get_footer(); ?>
