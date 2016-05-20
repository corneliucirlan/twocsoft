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


<main class="masonry-elements row">
	<?php foreach ($array as $x): ?>
		<div class="masonry-element col s12 m4 l4">
			<div class="card hoverable">
				<div class="card-content"><?php the_field('box-'.$x[0].'-'.$x[1]) ?></div>
			</div>
		</div>
	<?php endforeach; ?>
</main>
