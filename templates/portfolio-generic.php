<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

<main class="card card-block">
	<h1 class="card-title"><?php the_title() ?></h1>
	<?php the_content() ?>
</main>
