<?php

    // Security check
    if (!defined('ABSPATH')) die;

    the_post();
?>

<?php

	// SKILLS
	$skills = array();
	$skills[] = new SKILL('PHP', 4);
	$skills[] = new SKILL('HTML5',5);
	$skills[] = new SKILL('CSS3', 4);
	$skills[] = new SKILL('JavaScript', 3);
	$skills[] = new SKILL('Git', 2);
	$skills[] = new SKILL('AJAX', 5);
	$skills[] = new SKILL('WordPress', 4);
	$skills[] = new SKILL('MySQL', 3);
	$skills[] = new SKILL('Java', 2);
	$skills[] = new SKILL('Python', 2);
	$skills[] = new SKILL('Microsoft Office', 4);
	$skills[] = new SKILL('Eclipse IDE', 3);
	$skills[] = new SKILL('XML', 3);
	$skills[] = new SKILL('jQuery', 4);
	$skills[] = new SKILL('Web Development', 5);
	$skills[] = new SKILL('Plugins', 5);
	$skills[] = new SKILL('OOP', 4);

	shuffle($skills);

?>

<main class="row">
	<section class="card hoverable col s12 m12 l12" style="padding-bottom: 2rem;">
		<div class="card-content">
			<h2 class="card-title center-align"><?php the_title() ?></h2>
			<?php the_content() ?>
		</div>
	</section>

	<section class="card hoverable col s12 m12 l12" style="padding-bottom: 2rem;">
		<div class="card-content">
			<h2 class="card-title center-align">EXPERIENCE</h2>
			<?php the_field('experience') ?>
		</div>
	</section>

	<section class="card hoverable center-align col s12 m12 l12" style="padding-bottom: 2rem;">
		<div class="card-content">
			<h2 class="card-title center-align">SKILLS</h2>
			<div class=" masonry-elements">
				<?php for ($i = 1; $i < sizeof($skills); $i++) printSkill($skills[$i]); ?>
			</div>
		</div>
	</section>
						
	<section class="card hoverable center-align col s12 m12 l12" style="padding-bottom: 2rem;">
		<div class="card-content">
			<h2 class="cart-title center-align">CERTIFICATIONS</h2>
			<?php the_field('certifications') ?>
		</div>
	</section>
</main>