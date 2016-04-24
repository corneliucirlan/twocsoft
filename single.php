<?php

	// Security check
	if (!defined('ABSPATH')) die;

	the_post();
?>

<?php

	$cardSettings = array(
		'containerClass'		=> 'col s12 m8 l8',
		'showCardDetails'		=> true,
		'isSingle'				=> true,
		'showFooterShare'		=> false,
		'footerShareSettings'	=> array('id' => get_the_id(), 'alignRight' => true),
	);

?>


<?php get_header(); ?>

<div class="row">
	<main class="blog-post-main md-card-holder col-md-8">
		<?php displayCard($cardSettings) ?>
	</main>
</div>

<?php get_footer(); ?>