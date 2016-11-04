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
    $skills[] = new SKILL('SASS', 3);

	shuffle($skills);

?>

<div class="page-about row">

    <!-- About section -->
    <div class="card card-flat card-block">
        <h2 class="card-title"><?php the_title() ?></h2>
        <?php the_content() ?>
    </div>

    <!-- Experience section -->
    <div class="card card-flat card-block">
        <h2 class="card-title">Experience</h2>
        <?php the_field('experience') ?>
    </div>

    <!-- Skills section -->
    <div class="card card-flat card-block">
        <h2 class="card-title">Skills</h2>
        <div class="cards">
            <?php for ($i = 1; $i < sizeof($skills); $i++) printSkill($skills[$i]); ?>
    </div>
    <!-- <article class="skills card">
</div>
        <header class="card-header">
        </header>
        <div class="card-block">
        </div>
    </article> -->

    <!-- Certifications section -->
    <!-- <article class="card">
        <header class="card-header">
            <h2 class="card-title">Certifications</h2>
        </header>
        <div class="card-block text-xs-center">
            <?php the_field('certifications') ?>
        </div>
    </article> -->
</div>
