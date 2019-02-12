<?php

    /**
     * Template part for displaying blog posts
     *
     * @link https://codex.wordpress.org/Template_Hierarchy
     *
     * @package cornelius
     */
	// Security check
    if (!defined('ABSPATH')) exit;

    the_post();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>

    <!-- Title -->
    <h1><?php the_title(); ?></h1>

    <!-- Post meta -->
    <?php cornelius\core\Post::postMeta(); ?>

    <!-- Share -->
    <?php cornelius\core\Post::shareButtons(array('id' => get_the_id(), 'classes' => 'd-none d-md-flex')); ?>

    <!-- Content -->
    <?php the_content(); ?>

    <!-- Share -->
    <?php cornelius\core\Post::shareButtons(array('id' => get_the_id(), 'classes' => 'd-none d-md-flex')); ?>
    <?php cornelius\core\Post::shareButtons(array('id' => get_the_id(), 'classes' => 'fixed-bottom d-md-none')); ?>

    <!-- Tags -->
    <?php cornelius\core\Post::postTags() ?>

</article>
