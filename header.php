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

    // Get header image
    if (has_post_thumbnail()):
            $headerStyles = "background: url(".wp_get_attachment_url(get_post_thumbnail_id()).");
                background-position: center;";
        else:
            $headerStyles = "background-image: url(".get_header_image().");
                background-position: top;";
    endif;

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
        margin: 0;";
    // $detect = new Mobile_Detect();
    // if ($detect->isMobile() && !$detect->isTablet()):
    //         $headerHeight = "400px;";
    //     else:
            $headerHeight = "500px;";
    // endif;
    $headerStyles .= "height: ".$headerHeight;

    // Get Logo
    $custom_logo_id = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src($custom_logo_id , 'thumbnail');
    $logo = $logo[0];

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
        <nav class="navbar navbar-toggleable-md navbar-light">
            <button class="navbar-toggler d-md-none" type="button">
                <span class="menu-item-1"></span>
                <span class="menu-item-2"></span>
                <span class="menu-item-3"></span>
            </button>
            <img class="custom-logo d-md-none" src="<?php echo $logo ?>" alt="<?php bloginfo('title') ?>" />

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
            <div class="header-overlay" style="width: 100%; height: <?php echo $headerHeight; ?>">
                <img class="custom-logo d-none d-md-block" src="<?php echo $logo ?>" alt="<?php bloginfo('title') ?>" />
                <h1 class="header-title"><?php is_front_page() ? bloginfo('title') : the_title() ?></h1>
            </div>
        </div>

        <!-- Main content  -->
        <div class="main-container container-fluid">
