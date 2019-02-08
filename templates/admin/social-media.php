<?php
    /**
    * Template part for displaying a custom Admin area
    *
    * @link https://developer.wordpress.org/reference/functions/add_menu_page/
    *
	* @package ccwp
    */
?>

<div class="wrap">
	<h1><?php _e('Social Media', 'cornelius') ?></h1>
	<?php //settings_errors(); ?>

	<form method="post" action="options.php">
		<?php settings_fields('social-media-group'); ?>
		<?php do_settings_sections('social-media-settings'); ?>
		<?php submit_button(); ?>
	</form>
</div>