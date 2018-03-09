<?php

    /**
     * Template part for displaying cards
     *
     * @link https://codex.wordpress.org/Template_Hierarchy
     *
     * @package ccwp
     */

	// Security check
    if (!defined('ABSPATH')) exit;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>

    <!-- Card image -->
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("thumbnail", ['class' => 'card-img']); ?></a>

    <div class="card-body">

        <!-- Card title -->
        <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

        <!-- Excerpt -->
        <?php the_excerpt(); ?>
    </div>

</article>
