<?php

    /**
     * Template part for displaying About page
     *
     * @link https://codex.wordpress.org/Template_Hierarchy
     *
     * @package ccwp
     */
    // Security check
    if (!defined('ABSPATH')) die;

    the_post();
?>

<main class="page-portfolio cards row">

    <div class="col-12 col-md-8 offset-md-2">
        <?php the_content() ?>
    </div>

</main>
