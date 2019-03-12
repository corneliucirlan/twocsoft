<?php

    /**
     * Template part for displaying About page
     *
     * @link https://codex.wordpress.org/Template_Hierarchy
     *
     * @package cornelius
     */
    // Security check
    if (!defined('ABSPATH')) die;

    the_post();
?>

<main class="page-about row">

    <div class="col-12 col-md-8 offset-md-2">
        <?php the_content() ?>
        <a class="btn btn-primary" href="<?php the_permalink(PAGE_CONTACT) ?>"><?php _e('Hire me', 'cornelius') ?></a>
    </div>

</main>
