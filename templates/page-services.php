<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

<?php
	$array = array(
		0 => array(1, 1),
		1 => array(1, 2),
		2 => array(2, 1),
		3 => array(2, 2),
		4 => array(3, 1),
		5 => array(3, 2)
	);
	shuffle($array);
?>


<div class="page-services row">
    <div class="card-columns">
        <?php for ($x = 1; $x<= 6; $x++): ?>
            <article class="card">
                <header class="card-header">
                    <h2 class="card-title"><?php the_field('services-card-'.$x.'-title') ?></h2>
                </header>
                <div class="card-block">
                    <?php the_field('services-card-'.$x.'-body') ?>
                </div>
            </article>
        <?php endfor; ?>
    </div>
</div>
