<?php

    /**
     * Header template file
     *
     * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
     *
     * @package ccwp
     */

    // Security check
    if (!defined('ABSPATH')) die;

    // Set header image
    $headerStyles = "background: url(".get_header_image()."); background-position: bottom";

    // Set header image as featured image
    if (has_post_thumbnail())
        $headerStyles = "background: url(".wp_get_attachment_url(get_post_thumbnail_id())."); background-position: center;";

    // Set header image for Front Page and Blog Page
    if (is_front_page() || is_home())
        $headerStyles = "background: url(".get_header_image()."); background-position: bottom";

    // Set header image for blog articles
    if (is_singular('post') && has_post_thumbnail())
        $headerStyles = "background: url(".wp_get_attachment_url(get_post_thumbnail_id())."); background-position: top;";

    // Set header image style
    $headerStyles .= "background-repeat: no-repeat;
        position: relative;
        color: white;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        max-height: 500px
        padding: 0;
        margin: 0;
        height: 450px";

    // Get Logo
    $siteLogo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'thumbnail')[0];

    // Mobile logo
    $mobileLogo = get_theme_mod('mobile-custom-logo') ? get_theme_mod('mobile-custom-logo') : null;
?>

<!DOCTYPE html>
<html <?php language_attributes() ?>>
	<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <?php wp_head() ?>
    </head>

    <body <?php body_class() ?>>

        <!-- Header navigation -->
        <nav class="navbar navbar-header navbar-toggleable-md navbar-light">
            <button class="navbar-toggler d-md-none" type="button">
                <span class="menu-item-1"></span>
                <span class="menu-item-2"></span>
                <span class="menu-item-3"></span>
            </button>
            <?php if ($mobileLogo): ?>
                    <img class="custom-logo d-md-none" src="<?php echo $mobileLogo ?>" alt="<?php bloginfo('title') ?>" />
                <?php elseif (has_custom_logo()): ?>
                    <img class="custom-logo d-md-none" src="<?php echo $siteLogo ?>" alt="<?php bloginfo('title') ?>" />
            <?php endif; ?>

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

        <div class="header-container row" style="<?= $headerStyles ?>">
            <div class="header-overlay">
                <img class="custom-logo d-none d-md-block" src="<?php echo $siteLogo ?>" alt="<?php bloginfo('title') ?>" />
                <?php if (!is_singular('post')): ?>
                    <h1 class="header-title"><?php is_front_page() ? bloginfo('title') : single_post_title() ?></h1>
                    <?php if (is_front_page()): ?>
                        <h4 class="header-subtitle"><?php bloginfo('description') ?></h4>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Main content  -->
        <div class="main-container container-fluid">
