<?php

    /**
     * Template part for displaying generic portfolio items
     *
     * @link https://codex.wordpress.org/Template_Hierarchy
     *
     * @package ccwp
     */

	// Security check
    if (!defined('ABSPATH')) exit;

?>

<main class="col-12">
    <article class="card card-body">
        <h1 class="card-title"><?php the_title() ?></h1>
        <?php the_content() ?>
    </article>
</main>
