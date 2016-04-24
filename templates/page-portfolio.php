<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

<?php

	$cardSettings = array(
		'containerClass'		=> 'col s12 m6 l6',
		'showCardDetails'		=> false,
		'showFooterShare'		=> false,
		'footerShareSettings'	=> array('id' => get_the_id(), 'alignRight' => true),
	);

?>

<?php
	
	// get all portfolio items
	query_posts(array('post_type' => 'portfolio', 'posts_per_page' => -1));

	if (have_posts()):
		?><main class="row masonry-elements"><?php
			while (have_posts()):
				the_post();

				$cardSettings['buttons'] = array(
					'details'		=> array(
						'url'		=> get_the_permalink(),
						'label'		=> __('Details'),
						'target'	=> '_self',
						'class'		=> 'btn btn-primary',
					)
				);

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
	     ?></main><?php
	endif;
?>

	
					