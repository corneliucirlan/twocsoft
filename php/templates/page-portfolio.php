<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

<?php

	$cardSettings = array(
		'containerClass'		=> 'col-md-6',
		'showCardDetails'		=> false,
		'showFooterShare'		=> false,
		'footerShareSettings'	=> array('id' => get_the_id(), 'alignRight' => true),
	);

?>

<main class="md-cards-holder row">
	<?php
		
		$args = array(
			'posts_per_page' 	=> -1,
			'post_type' 		=> POST_TYPE_PORTFOLIO,
			'post_tatus'		=> 'publish',
		);
		query_posts($args);
		
		if (have_posts()):
			while (have_posts()):
				the_post();

				$cardSettings['buttons'] = array(
					'details'		=> array(
						'url'		=> get_the_permalink(),
						'label'		=> __('Details'),
						'target'	=> '_self',
						'class'		=> 'btn btn-primary',
					));

				if (get_field('portfolio-type') == PORTFOLIO_WEBSITE):
					$cardSettings['buttons']['liveVersion']	= array(
						'url'		=> get_field('website-url'),
						'label'		=> __('Live version'),
						'target'	=> '_blank',
						'class'		=> 'btn btn-primary',
					);
				endif;

				displayCard($cardSettings);
			endwhile;
		endif;
	?>
<main>

	
					