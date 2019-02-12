<?php
    /**
     * Template part for displaying cards
     *
     * @link https://codex.wordpress.org/Template_Hierarchy
     *
     * @package cornelius
     */
	// Security check
    if (!defined('ABSPATH')) exit;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>

    <!-- Card image -->
    <?php if (has_post_thumbnail()): ?>
        <a href="<?php the_permalink() ?>"><img class="card-img-top" src="<?php echo get_the_post_thumbnail_url() ?>" /></a>
    <?php endif; ?>

    <!-- Card title -->
    <a href="<?php the_permalink() ?>"><h2 class="card-title"><?php the_title() ?></h2></a>

    <!-- Excerpt -->
    <p class="card-text"><?php echo get_the_excerpt() ?></p>

</article>
