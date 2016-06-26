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

	<body>

		<!-- Header -->
        <header>
            <nav class="navbar navbar-fixed-top navbar-full navbar-light bg-faded">

                <div class="container-fluid">

                    <!-- Navigation toggle -->
                    <button class="navbar-toggler hidden-lg-up" type="button"><i class="fa fa-bars"></i></button>

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
                    <div class="header-social">
			      		<ul class="social-icons">
                            <li><a class="facebook" target="_blank" href="https://www.facebook.com/corneliucirlan" title="Follow me on Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="twitter" target="_blank" href="https://twitter.com/corneliucirlan" title="Follow me on Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="google-plus" target="_blank" href="https://plus.google.com/+CorneliuCirlan" title="Follow me on Google+"><i class="fa fa-google-plus"></i></a></li>
                            <li><a class="linkedin" target="_blank" href="https://www.linkedin.com/in/corneliucirlan" title="Follow me on Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
			      	</div>

                </div>
            </nav>

            <!-- Header image -->
            <div class="row" style="position: relative; background: url(<?php echo $headerImage ?>); top center no-repeat; color: white; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; max-height: 100%; max-width: 100%; min-height: 600px; min-height: 37.5rem; padding: 0px; margin: -64px 0 0; background-attachment: fixed;">
                <!--<div class="header-wrapper">
                    <h1 class="header-title"><?php bloginfo('name') ?></h1>
                     <span class="share-button">
                        <a href="https://twitter.com/intent/tweet?screen_name=corneliucirlan&hashtags=AskCorneliu&text=&nbsp;" target="_blank" style="font-size: 30px">
                            #AskCorneliu
                        </a>
                    </span>
                </div> -->
            </div>

            <div class="breadcrumbs-container container-fluid">
                <div class="col-xs-12 <?php echo $isSingular ? 'col-md-12 col-lg-12' : 'col-md-8 col-lg-8' ?>">
                    <?php renderBreadcrumbs() ?>
                </div>
                <?php if (!$isSingular): ?>
                    <div class="col-xs-12 col-md-4 col-lg-4">
                        <?php displayShareButtons($pageSettings) ?>
                    </div>
                <?php endif; ?>
            </div>
        </header>

        <!-- Main Content -->
        <?php if (!is_page(PAGE_BLOG)): ?>
                <main class="main-container container-fluid">
            <?php else: ?>
                <div class="main-container container-fluid">
        <?php endif; ?>
