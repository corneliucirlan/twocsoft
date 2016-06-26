<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

<?php

	$cardSettings = array(
		'containerClass'		=> 'col-sm-12 col-md-6',
		'showCardDetails'		=> false,
        
		'showFooterShare'		=> true,
		'footerShareSettings'	=> array('id' => get_the_id(), 'alignRight' => true),
	);

?>

<?php

	// get all portfolio items
	query_posts(array('post_type' => POST_TYPE_PORTFOLIO, 'posts_per_page' => -1));

	if (have_posts()):

		?><div class="page-portfolio row"><?php
            ?><div class="card-columns"><?php
        		while (have_posts()):
        			the_post();

        			$cardSettings['buttons'] = array(
        				'details'		=> array(
        					'url'		=> get_the_permalink(),
        					'label'		=> __('Details'),
        					'target'	=> '_self',
        				)
        			);

        			if (get_field('portfolio-type') == PORTFOLIO_WEBSITE):
        				$cardSettings['buttons']['liveVersion']	= array(
        					'url'		=> get_field('website-url'),
        					'label'		=> __('Live version'),
        					'target'	=> '_blank',
        				);
        			endif;

        			displayCard($cardSettings);
        		endwhile;
		    ?></div><?php
        ?></div><?php
	endif;
?>
