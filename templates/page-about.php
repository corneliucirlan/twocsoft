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

<?php

    // Load Skill class
    use ccwp\custom\skill;

	// SKILLS
	$skills = array();
	$skills[] = new Skill('PHP', 4);
	$skills[] = new Skill('HTML5',5);
	$skills[] = new Skill('CSS3', 4);
	$skills[] = new Skill('JavaScript', 3);
	$skills[] = new Skill('Git', 3);
	$skills[] = new Skill('AJAX', 5);
	$skills[] = new Skill('WordPress', 4);
	$skills[] = new Skill('MySQL', 3);
	$skills[] = new Skill('Java', 2);
	$skills[] = new Skill('Python', 2);
	// $skills[] = new Skill('Microsoft Office', 4);
	$skills[] = new Skill('Eclipse IDE', 3);
	$skills[] = new Skill('XML', 3);
	$skills[] = new Skill('jQuery', 4);
	$skills[] = new Skill('Web Development', 5);
	$skills[] = new Skill('Plugins', 5);
	$skills[] = new Skill('OOP', 4);
    $skills[] = new Skill('SASS', 3);
    $skills[] = new Skill('Adobe XD', 4);

    // Shuffle skills
	shuffle($skills);

?>

<main class="page-about row">

    <!-- About section -->
    <!-- <div class="card card-body">
        <h2 class="card-title"><?php the_title() ?></h2>
        <?php the_content() ?>
    </div> -->

    <!-- Experience section -->
    <div class="card card-body">
        <h2 class="card-title">Experience</h2>
        <?php the_field('experience') ?>
    </div>

    <!-- Skills section -->
    <div class="card card-body">
        <h2 class="card-title">Skills</h2>
        <div class="cards">
            <?php
                foreach ($skills as $key => $skill):
                    $skill->renderSkill();
                endforeach;
            ?>
        </div>
    </div>
</main>
