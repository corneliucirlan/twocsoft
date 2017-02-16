<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

<?php

    $cardSettings = array(
        'cardWrapper'			=> 'col-12 col-sm-6 col-lg-4 col-xl-3',

        'blogPost'				=> true,
    );

    query_posts(array('post_type' => POST_TYPE_PORTFOLIO, 'posts_per_page' => -1));
?>

<main class="page-portfolio cards row">
    <?php if (have_posts()): ?>
		<?php while (have_posts()): the_post() ?>
			<?php renderCard($cardSettings) ?>
		<?php endwhile; ?>
	<?php endif; ?>
</main>
