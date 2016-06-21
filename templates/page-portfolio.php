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
	query_posts(array('post_type' => POST_TYPE_PORTFOLIO, 'posts_per_page' => -1));

	if (have_posts()):
		?><div class="card-columns"><?php
		while (have_posts()):
			the_post();

			$image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

			?>
			<div class="card">
				<div class="card-block">
					<h2 class="card-title"><?php the_title() ?></h2>
					<img src="<?php echo $image ?>" alt="Card image cap" />
					<p class="card-text"><?php the_excerpt() ?></p>
				</div>
				<footer>
					Actions here
				</footer>
			</div>

			<?php

			/*$cardSettings['buttons'] = array(
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

			displayCard($cardSettings);*/
		endwhile;
			?></div><?php
	endif;
?>
