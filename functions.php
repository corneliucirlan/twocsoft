<?php

	// Load global variables
	include_once('functions/globals.php');

	// Register scripts
	include_once('functions/register-scripts.php');

	// Load WP specific loaders
	include_once('functions/enqueue.php');

	// Load custom theme functions
	include_once('functions/theme-functions.php');

	// Load custom post types
	include_once('functions/post-types.php');

	// Load misc
	include_once('functions/misc.php');

	// Load breadcurmbs
	include_once('libs/breadcrumbs.php');

	// Load remove
	include_once('functions/remove.php');

	// Load backend functions
	include_once('functions/backend.php');

	// Load most popular posts
	include_once('libs/most-read-posts.php');

?>
