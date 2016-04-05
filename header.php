<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

<?php

    if (is_front_page() || is_home() || is_page() || is_singular(POST_TYPE_PORTFOLIO) || is_category() || is_tag() || is_tax()):

            // show social media buttons on breadcrumbs row
            $isPage = true;

            // create social media settings
            $pageSettings = array();

            // page is category page
            if (is_category()):
                    global $cat;
                    $pageSettings['id'] = $cat;
                    $pageSettings['isCategory'] = true;

                // page is blog page
                elseif (is_home()):
                        $pageSettings['id'] = get_option('page_for_posts', true);

                    // page is tag page
                    elseif (is_tag()):
                            $pageSettings['id'] = get_query_var('tag_id');
                            $pageSettings['isTag'] = true;

                    // page is ordinary page
                    else:
                        $pageSettings['id'] = get_the_id();
            endif;

            // set buttons to the right
            $pageSettings['alignRight'] = true;

        else:
            $isPage = false;
    endif;

?>

<!DOCTYPE html>
<html <?php language_attributes() ?>>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php wp_title() ?></title>

        <?php wp_head() ?>
     </head>

    <body>
                    <?php
                        $menu = wp_get_nav_menu_object ('main-menu');

                        $menu_items = wp_get_nav_menu_items($menu->term_id);
                    
                        //echo '<pre><code>';
                        //var_dump($menu_items);
                        //echo '</pre></code>';
                    ?>
        
        <!-- HEADER -->
        <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">

                    <!-- BRAND -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-target="#header-menu">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a>
                    </div>

                    <!-- MENU -->
                    <div class="collapse navbar-collapse" id="header-menu">
                        <?php
                            if (has_nav_menu('header-menu'))
                                wp_nav_menu(array(
                                    'theme_location' => 'header-menu',
                                    'container' => 'ul',
                                    'container_class' => 'collapse navbar-collapse',
                                    'container_id' => 'header-menu',
                                    'menu_class' => 'nav navbar-nav',
                                    'menu_id' => '',
                                    'echo' => true,
                                    'fallback_cb' => false,
                                    'before' => '',
                                    'after' => '',
                                    'link_before' => '',
                                    'link_after' => '',
                                    'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
                                    'depth' => 2,
                                    'walker' => ''
                                ));
                            ?>
                    </div>
                </div>
            </nav>

            <?php
                $headerImage = get_header_image();
                //$headerDetect = new Mobile_Detect();

                /*if ($headerDetect->isTablet() && $headerDetect->isMobile()):
                        $headerImage = preg_replace('/.jpg$/', '', $headerImage).'-600x147.jpg';
                    elseif ($headerDetect->isMobile()):
                        $headerImage = preg_replace('/.jpg$/', '', $headerImage).'-400x98.jpg';
                endif;*/
            ?>
            <img src="<?php echo $headerImage; ?>" alt="<?php bloginfo('name') ?> header" />
        </header>

        <!-- MAIN CONTENT -->
        <div class="container-fluid">
            <div class="content col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">

                <!-- BREADCRUMBS -->
                <div class="breadcrumbs-container row">
                    <div class="no-padding-left <?php echo $isPage ? 'col-md-8' : 'col-md-12' ?>">
                        <?php renderBreadcrumbs() ?>
                    </div>
                    <?php if ($isPage): ?>
                        <div class="no-padding-right col-md-4">
                            <?php displayShareButtons($pageSettings) ?>
                        </div>
                    <?php endif; ?>
                </div>