<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

<?php

	// Get header image
	$headerImage = get_header_image();

    if (!is_singular('post')):

	    	// is not singular page
	    	$isSingular = false;

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

	  	// is singular page
	  	else:
	  		$isSingular = true;
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

    <body class="<?php echo join(' ', get_body_class()) ?>">

		<!-- Header -->
        <header>
            <nav class="navbar navbar-fixed-top navbar-full navbar-light">

                <div class="container-fluid">

                    <!-- Navigation toggle -->
                    <button class="navbar-toggler hidden-lg-up" type="button"></button>

                    <!-- Logo -->
                    <a href="<?php bloginfo('url') ?>"><img class="logo" src="<?= THEME_URI ?>img/logo.png" width="100" height="29" alt="<?php bloginfo() ?>" /></a>

                    <?php
                        // Render header menu
                        if (has_nav_menu('header-menu')):
                            $args = array(
                                'theme_location' => 'header-menu',
                                'menu' => 'header-menu',
                                'container' => 'ul',
                                'menu_class' => 'nav navbar-nav',
                                'echo' => true,
                                'fallback_cb' => 'wp_page_menu',
                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth' => 0,
                            );
                            wp_nav_menu($args);
                        endif;
                    ?>
                	<ul class="social-icons header-icons">
                        <li><a class="social-link" target="_blank" href="<?= get_option('facebook_link') ?>" title="Follow me on Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="social-link" target="_blank" href="<?= get_option('instagram_link') ?>" title="Follow me on Instagram"><i class="fa fa-instagram"></i></a></li>
                        <li><a class="social-link" target="_blank" href="<?= get_option('twitter_link') ?>" title="Follow me on Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="social-link" target="_blank" href="<?= get_option('google_plus_link') ?>" title="Follow me on Google+"><i class="fa fa-google-plus"></i></a></li>
                        <li><a class="social-link" target="_blank" href="<?= get_option('linkedin_link') ?>" title="Follow me on Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>

                </div>
            </nav>

            <!-- Header image -->
            <div class="header-image row" style="position: relative; background: url(<?php echo $headerImage ?>); background-position: top center; background-repeat: no-repeat; color: white; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; max-height: 100%; max-width: 100%; min-height: 500px; min-height: 31.25rem; padding: 0px; margin: -64px 0 0;"></div>

            <div class="breadcrumbs-container container-fluid">
                <div class="row">
                    <div class="<?= $isSingular ? 'col-xs-12' : 'col-xs-12 col-md-8' ?>">
                        <?php renderBreadcrumbs() ?>
                    </div>
                    <?php if (!$isSingular): ?>
                        <div class="col-xs-12 col-md-4">
                            <?php displayShareButtons($pageSettings) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="main-container container-fluid">
