<?php

	/**
	 * 404 Template file
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package ccwp
	 */

	// Security check
	if (!defined('ABSPATH')) die;

?>

<!DOCTYPE html>
<html <?php language_attributes() ?>>
	<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <?php wp_head() ?>
    </head>

	<body <?php body_class() ?>>

		<nav class="navbar navbar-header navbar-toggleable-md navbar-light">
            <button class="navbar-toggler d-md-none" type="button">
                <span class="menu-item-1"></span>
                <span class="menu-item-2"></span>
                <span class="menu-item-3"></span>
            </button>

            <?php
                // Render header menu
                if (has_nav_menu('header-menu')):
                    $args = array(
                        'theme_location' => 'header-menu',
                        'menu' => 'header-menu',
                        'container' => 'ul',
                        'menu_class' => 'navbar-nav navbar-nav-header d-none d-md-block',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 0,
                    );
                    wp_nav_menu($args);
                endif;
            ?>
        </nav>

		<main class="content-404 row">
			<div class="text-container col-12 col-md-4 offset-md-2">
				<h1 class="title-404">This is a <span class="text-primary">404</span> page</h1>
				<p class="text-muted">You are here because you clicked a dead link or typed something stupid into the address bar.</p>
				<p class="text-muted">Some creative-type people might use this page to express their artistic side with an illustration or a funny .gif. Something creative like that.</p>
				<p class="text-muted">But I'm not that guy.</p>
				<p class="text-muted">Use the navigation to get where you want to go.</p>
			</div>
		</main>

		<?php wp_footer() ?>
	</body>
</html>
