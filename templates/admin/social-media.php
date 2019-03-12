<?php

    /**
    * Template part for displaying a custom Admin area
    *
    * @link https://developer.wordpress.org/reference/functions/add_menu_page/
    *
	* @package cornelius
    */

	use cornelius\custom\themeSettings;

?>

<div class="wrap">
	<h1><?php _e('Social Media', 'cornelius') ?></h1>
	<?php //settings_errors(); ?>

	<form method="post" action="options.php">
		<?php settings_fields(ThemeSettings::SOCIAL_MEDIA_GROUP); ?>
		<?php do_settings_sections(ThemeSettings::SOCIAL_MEDIA_SLUG); ?>
		<?php submit_button(); ?>
	</form>
</div>
