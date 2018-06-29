<?php

    /**
     * Template part for displaying website portfolio items
     *
     * @link https://codex.wordpress.org/Template_Hierarchy
     *
     * @package ccwp
     */

	// Security check
    if (!defined('ABSPATH')) exit;

?>

<main class="col-12">
    <article class="single-website card card-body">
        <h1 class="card-title"><?php the_title() ?></h1>

        <div class="row">
            <div class="single-website-previews col-xs-12 col-md-6">
                <?php for ($x = 1; $x <= 5; $x++): ?>
                    <?php echo ($image = wp_get_attachment_image(get_field('website-image-'.$x), 'large')) ? $image : ""; ?>
                <?php endfor; ?>
            </div>
            <div class="single-website-description sticky-top col-xs-12 col-md-6">
                <?php the_content() ?>
                <a class="btn btn-outline-primary" href="<?= the_field('website-uri') ?>" target="_blank">Visit Live Version</a>
                <?php ccwp\core\Tags::displayShareButtons(array('id' => get_the_id(), 'bottom' => false)) ?>
            </div>
        </div>
    </article>
</main>
