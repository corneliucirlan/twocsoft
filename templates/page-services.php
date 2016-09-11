<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

<div class="page-services row">
    <div class="card-columns">
        <?php for ($x = 1; $x<= 6; $x++): ?>
            <?php if (($serviceTitle = get_field('services-card-'.$x.'-title')) && ($serviceBody = get_field('services-card-'.$x.'-body'))): ?>
                <article class="card">
                    <header class="card-header">
                        <h2 class="card-title"><?php echo $serviceTitle ?></h2>
                    </header>
                    <div class="card-block"><?php echo $serviceBody ?></div>
                </article>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
</div>
