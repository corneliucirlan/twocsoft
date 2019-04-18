<?php

    /**
     * Header template file
     *
     * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
     *
     * @package cornelius
     */

    // Security check
    if (!defined('ABSPATH')) die;

    // Set header image availability
    $hasHeaderImage = false;

    // Check if header image is available
    if (has_header_image()):

        // Set header image availability
        $hasHeaderImage = !$hasHeaderImage;

        // Set header image
        $headerStyles = "background: url(".get_header_image()."); background-position: top;";

        // // Set header image as featured image
        // if (has_post_thumbnail())
        //     $headerStyles = "background: url(".wp_get_attachment_url(get_post_thumbnail_id())."); background-position: center;";
        //
        // // Set header image for Front Page and Blog Page
        // if (is_front_page() || is_home())
        //     $headerStyles = "background: url(".get_header_image()."); background-position: center;";
        //
        // // Set header image for blog articles
        // if (is_singular('post') && has_post_thumbnail())
        //     $headerStyles = "background: url(".wp_get_attachment_url(get_post_thumbnail_id())."); background-position: top;";

        // Set header image style
        $headerStyles .= "background-repeat: no-repeat;
        position: relative;
        color: white;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        max-height: 400px
        padding: 0;
        margin: 0;
        height: 400px";
    endif;


    // Get Logo
    $siteLogo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'thumbnail')[0];

    // Mobile logo
    $mobileLogo = get_theme_mod('mobile-custom-logo') ? get_theme_mod('mobile-custom-logo') : null;

    // Set page title
    $pageTitle = get_the_title();

    // Frontpage title
    if (is_front_page()):
        $pageTitle = get_bloginfo('title');
    endif;

    // Single post title
    if (is_home()):
        $pageTitle = single_post_title(null, false);
    endif;

    // Single category title
    if (is_category()):
        $pageTitle = single_cat_title(null, false);
    endif;

    // Single tag title
    if (is_tag()):
        $pageTitle = single_tag_title(null, false);
    endif;

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
            <div class="container-fluid">
                <button class="navbar-toggler d-md-none" type="button">
                    <span class="menu-item-1"></span>
                    <span class="menu-item-2"></span>
                    <span class="menu-item-3"></span>
                </button>

                <?php if ($mobileLogo): ?>
                    <a class="navbar-brand d-md-none" href="<?php bloginfo('url') ?>"><img class="custom-logo" src="<?php echo $mobileLogo ?>" alt="<?php bloginfo('title') ?>" /></a>
                <?php endif; ?>
                <a class="navbar-brand <?php echo $mobileLogo ? 'd-none d-md-block' : '' ?>" href="<?php bloginfo('url') ?>"><img class="custom-logo" src="<?php echo $siteLogo ?>" alt="<?php bloginfo('title') ?>" /></a>

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
            </div>
        </nav>

        <div class="wp-custom-header" style="<?php echo $hasHeaderImage ? $headerStyles : '' ?>">
            <?php if (!is_singular('post')): ?>
                <h1 class="header-title"><?php echo $pageTitle ?></h1>
            <?php endif; ?>
            <?php if (is_front_page()): ?>
                <span class="tagline tagline-header"><?php bloginfo('description') ?></span>
            <?php endif; ?>
        </div>

        <!-- Main content  -->
        <div class="main-container container-fluid">
