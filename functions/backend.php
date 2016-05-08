<?php

	// Add favicon to the backend
	function add_favicon()
	{
	  	$favicon_url = THEME_URI.'img/favicon/favicon.ico';
		echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
	}
	add_action('login_head', 'add_favicon');
	add_action('admin_head', 'add_favicon');

?>