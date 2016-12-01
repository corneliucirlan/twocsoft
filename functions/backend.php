<?php

	// Add favicon to the backend
	function add_favicon()
	{
	  	$favicon_url = THEME_URI.'img/favicon/favicon.ico';
		echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
	}
	add_action('login_head', 'add_favicon');
	add_action('admin_head', 'add_favicon');

	// login logo
	function customLoginLogo()
	{
		$logo = THEME_URI.'img/logo.png';
		?>
		<style>
			.login h1 a {
				background-image: url('<?= $logo ?>') !important;
				background-size: contain;
				width: 320px;
				height: 94px;
			}
		</style>
		<?php
	}
	add_action('login_head', 'customLoginLogo');

?>
