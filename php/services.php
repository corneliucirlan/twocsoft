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

<div class="col-md-10 col-md-offset-1">
	<div class="services row">
		<?php foreach ($array as $x): ?>
			<div class="service col-md-6"><div class="card"><?php the_field('box-'.$x[0].'-'.$x[1]) ?></div></div>
		<?php endforeach; ?>
	</div>
</div>