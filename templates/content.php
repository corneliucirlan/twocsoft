<?php

    /**
     * Template part for displaying blog posts
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
    <!-- <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("large", ['class' => 'card-img']); ?></a> -->

    <div class="card-body">

        <!-- Title -->
        <h1 class="card-title"><?php the_title(); ?></h1>

        <!-- Post meta -->
        <?php ccwp\core\Tags::postMeta(); ?>

        <!-- Content -->
        <?php the_content(); ?>

        <!-- Share -->
        <?php ccwp\core\Tags::displayShareButtons(array('id' => get_the_id(), 'bottom' => true)); ?>

        <!-- Tags -->
        <div class="card-footer post-tags">
			<i class="fa fa-tag no-animation"></i>
			<?php echo get_the_tag_list('<ul class="tags"><li class="tag">', '</li><li class="tag">', '</li></ul>') ?>
		</div>
    </div>

</article>
