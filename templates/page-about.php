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

<main class="page-about row">

    <!-- About section -->
    <!-- <section class="col-12">
        <div class="card card-body">
            <h2 class="card-title"><?php the_title() ?></h2>
            <?php the_content() ?>
        </div>
    </section> -->

    <!-- Experience section -->
    <section class="col-12">
        <div class="card card-body">
            <h2 class="card-title">Experience</h2>
            <?php the_field('experience') ?>
        </div>
    </section>

    <!-- Skills section -->
    <section class="col-12">
        <div class="card card-body">
            <h2 class="card-title">Skills</h2>
            <div class="cards">
                <?php
                    global $wpdb;

                    // Get all skills
                    $skills = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."skills WHERE status=1", ARRAY_A);

                    // Shuffle skills
                    shuffle($skills);

                    // Loop over all skills
                    foreach ($skills as $key => $skill):
                        ?>
                        <div class="card-wrapper col-xs-12 col-sm-6 col-md-2">
                            <div class="card card-flat card-borderless">
                                <h3><?php echo $skill['name'] ?></h3>
                                <div class="item-stars text-center">
                                    <?php for ($x = 1; $x <= 5; $x++): ?>
                                        <?php echo $x <= $skill['level'] ? '<i class="fa fa-star"></i>' : '<i class="fa fa-star-o"></i>'; ?>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                ?>
            </div>
        </div>
    </section>
</main>
