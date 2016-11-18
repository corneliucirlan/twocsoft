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

	<aside class="col-md-4">
		<div class="card card-flat">
			<div class="fb-page" data-href="https://www.facebook.com/corneliucirlan/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-width="500" data-show-facepile="true"><blockquote cite="https://www.facebook.com/corneliucirlan/" class="fb-xfbml-parse-ignore"><a class="text-center" href="https://www.facebook.com/corneliucirlan/"><?php bloginfo('name') ?> on Facebook</a></blockquote></div>
		</div>

		<div class="card card-flat">
			<a class="twitter-timeline" data-height="500" href="https://twitter.com/corneliucirlan"><?php bloginfo('name') ?> on Twittern</a>
		</div>
	</aside>
</div>

<?php get_footer(); ?>
