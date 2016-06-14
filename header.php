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

		<!-- Navigation -->
		<header class="navbar-fixed">
            <nav>
			    <div class="nav-wrapper container">
			      	<a href="#" data-activates="nav-mobile-menu" class="button-collapse"><i class="fa fa-bars" style="color: #444;"></i></a>

					<?php
			      		if (has_nav_menu('header-menu')):

		      			   	// desktop menu
		      			   	$args = array(
		      					'theme_location' => 'header-menu',
		      					'menu' => 'header-menu',
		      					'container' => 'ul',
		      					'container_class' => 'side-nav',
		      					'container_id' => 'nav-desktop-menu',
		      					'menu_class' => 'hide-on-med-and-down', /*right */
		      					'menu_id' => '',
		      					'echo' => true,
		      					'fallback_cb' => 'wp_page_menu',
		      					'before' => '',
		      					'after' => '',
		      					'link_before' => '',
		      					'link_after' => '',
		      					'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
		      					'depth' => 0,
		      					'walker' => ''
		      				);
		      				wp_nav_menu($args);

		      				// mobile menu
			      			$args = array(
		      					'theme_location' => 'header-menu',
		      					'menu' => 'header-menu',
		      					'container' => 'ul',
		      					'container_class' => 'side-nav',
		      					'container_id' => 'nav-mobile-menu',
		      					'menu_class' => 'side-nav',
		      					'menu_id' => '',
		      					'echo' => true,
		      					'fallback_cb' => 'wp_page_menu',
		      					'before' => '',
		      					'after' => '',
		      					'link_before' => '',
		      					'link_after' => '',
		      					'items_wrap' => '<ul id="nav-mobile-menu" class = "%2$s">%3$s</ul>',
		      					'depth' => 0,
		      					'walker' => ''
		      				);
		      				wp_nav_menu($args);
			      		endif;
			      	?>
			      	<div class="right">
			      		<ul class="footer-follow-us">
                            <li><a class="facebook" target="_blank" href="https://www.facebook.com/corneliucirlan" title="Follow me on Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="twitter" target="_blank" href="https://twitter.com/corneliucirlan" title="Follow me on Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="google-plus" target="_blank" href="https://plus.google.com/+CorneliuCirlan" title="Follow me on Google+"><i class="fa fa-google-plus"></i></a></li>
                            <li><a class="linkedin" target="_blank" href="https://www.linkedin.com/in/corneliucirlan" title="Follow me on Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
			      	</div>
			    </div>
			</nav>
		</header>

		<!-- Header image -->
        <div class="row" style="background: url(<?php echo $headerImage ?>); top center no-repeat; color: white; background-size: cover; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; max-height: 100%; max-width: 100%; min-height: 500px; min-height: 50rem; padding: 0px; margin: -64px 0 0; background-attachment: fixed;">
        </div>

		<!-- Content -->
		<div class="container main-container">

			<!-- Page H1 title -->
			<h1 class="offsite-title"><?php the_title() ?></h1>

			<!-- Breadcrumbs -->
            <div class="breadcrumbs-container row">
                <div class="no-padding-left col s12 <?php echo $isSingular ? 'm12 l12' : 'm8 l8' ?>">
                    <?php renderBreadcrumbs() ?>
                </div>
                <?php if (!$isSingular): ?>
	                <div class="no-padding-right col s12 m4 l4">
	                    <?php displayShareButtons($pageSettings) ?>
	                </div>
                <?php endif; ?>
            </div>
