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

    the_post();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>

    <!-- Title -->
    <h1><?php the_title(); ?></h1>

    <!-- Post meta -->
    <?php ccwp\core\Tags::postMeta(); ?>

    <!-- Share -->
    <?php ccwp\core\Tags::displayShareButtons(array('id' => get_the_id(), 'classes' => 'd-none d-md-flex')); ?>

    <!-- Content -->
    <?php the_content(); ?>

    <!-- Share -->
    <?php ccwp\core\Tags::displayShareButtons(array('id' => get_the_id(), 'classes' => 'd-none d-md-flex')); ?>
    <?php ccwp\core\Tags::displayShareButtons(array('id' => get_the_id(), 'classes' => 'fixed-bottom d-md-none')); ?>

    <!-- Tags -->
    <?php if (has_tag()): ?>
        <div class="card-footer post-tags">
    		<i class="fas fa-tags fa-2x no-animation"></i>
    		<?php echo get_the_tag_list('<ul class="tags"><li class="tag">', '</li><li class="tag">', '</li></ul>') ?>
    	</div>
    <?php endif; ?>

</article>
