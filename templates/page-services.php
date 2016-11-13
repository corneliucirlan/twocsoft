<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

<?php

	$cardSettings = array(
		'cardWrapper'			=> 'col-xs-12 col-sm-6 col-lg-4',
	);

?>

<div class="page-services cards row">
    <?php for ($x = 1; $x<= 6; $x++): ?>
        <?php if (($serviceTitle = get_field('services-card-'.$x.'-title')) && ($serviceBody = get_field('services-card-'.$x.'-body'))): ?>
            <?php
                $cardContent['title'] = $serviceTitle;
                $cardContent['content'] = $serviceBody;

                renderCard($cardSettings, $cardContent);
            ?>
        <?php endif; ?>
    <?php endfor; ?>
</div>
