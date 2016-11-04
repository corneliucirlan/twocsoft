<?php

    // Security check
    if (!defined('ABSPATH')) die;

    the_post();

?>

<?php get_header() ?>

<div class="page-frontpage card-deck-wrapper">
    <div class="card-deck">
        <div class="card-wrapper card latest-project">
            <?php query_posts(array('post_type' => POST_TYPE_PORTFOLIO, 'posts_per_page' => 1)); ?>
            <?php the_post() ?>
            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(getPhotoSize()) ?></a>
            <div class="card-block">
                <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                <?php the_excerpt() ?>
            </div>
        </div>

        <?php query_posts(array('post_type' => 'post', 'posts_per_page' => 1, 'post_status' => 'publish')); ?>
        <?php if (have_posts()): the_post(); ?>
            <div class="card-wrapper card latest-blog-post">
                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(getPhotoSize()) ?></a>
                <div class="card-block">
                    <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                    <?php the_excerpt() ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer() ?>
