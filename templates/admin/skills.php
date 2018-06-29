<?php

    /**
    * Template part for displaying a custom Admin area
    *
    * @link https://developer.wordpress.org/reference/functions/add_menu_page/
    *
	* @package ccwp
    */

?>

<?php

    use ccwp\custom\skills\skillsPage;

    $skills = new SkillsPage();
    $skills->prepare_items();

?>

<div class="wrap">
    <h1>
        <?php _e('Skills', 'cornelius'); ?>
        <a class="add-new-h2"><?php _e('Add new skill', 'cornelius'); ?></a>
    </h1>

    <form class="" action="" method="post">
        <?php $skills->views(); ?>

        <!-- Search box -->
        <?php $skills->search_box('search', 'search_id') ?>

        <?php $skills->display(); ?>
    </form>
</div>
