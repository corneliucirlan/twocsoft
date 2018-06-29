<?php

    /**
     * Template part for displaying Services page
     *
     * @link https://codex.wordpress.org/Template_Hierarchy
     *
     * @package ccwp
     */

    // Security check
    if (!defined('ABSPATH')) die;

?>

<main class="page-services cards row">
    <?php for ($x = 1; $x<= 6; $x++): ?>
        <?php if (($serviceTitle = get_field('services-card-'.$x.'-title')) && ($serviceBody = get_field('services-card-'.$x.'-body'))): ?>
            <div class="card-wrapper col-xs-12 col-md-4">
                <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>

                    <!-- Card image -->
                    <div class="card-body">

                        <!-- Card title -->
                        <h3 class="card-title"><?php echo $serviceTitle; ?></h3>

                        <!-- Excerpt -->
                        <?php echo $serviceBody; ?>
                    </div>

                </article>
            </div>

        <?php endif; ?>
    <?php endfor; ?>
</main>
