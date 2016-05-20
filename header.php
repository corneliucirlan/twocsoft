<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

<?php

	// Get header image
	$headerImage = get_header_image();
	$headerDetect = new Mobile_Detect();
	if ($headerDetect->isTablet() && $headerDetect->isMobile()):
			$headerImage = preg_replace('/.png$/', '', $headerImage).'-600x172.png';
		elseif ($headerDetect->isMobile()):
			$headerImage = preg_replace('/.png$/', '', $headerImage).'-400x115.png';
	endif;


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

	<body style="background-image: url(<?php echo $headerImage ?>); background-size: 100%; background-repeat: no-repeat;"> <!--   -->

		<!-- Navigation -->
		<header class="navbar-fixed">
			<nav>
			    <div class="nav-wrapper container">
			    	<a href="<?php bloginfo('url') ?>" class="brand-logo"><?php bloginfo() ?></a>
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
		      					'menu_class' => 'right hide-on-med-and-down',
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
			    </div>
			</nav>
		</header>

		<!-- Header image (added for space, hidden) -->
        <div class="row" style="margin-bottom: 0;">
        	<div class="col s12 m12 l12">
        		<img class="header-image" src="<?php echo $headerImage ?>" width="1948" height="560" alt="<?php bloginfo('name') ?> header" />
        	</div>
		</div>
 
		<div class="container main-container">

			<!-- Page H1 title -->
			<h1 class="offsite-title"><?php the_title() ?></h1>

			<!-- BREADCRUMBS -->
            <div class="breadcrumbs-container row">
                <div class="no-padding-left col s12 <?php echo $isSingular ? 'l12' : 'l8' ?>">
                    <?php renderBreadcrumbs() ?>
                </div>
                <?php if (!$isSingular): ?>
	                <div class="no-padding-right col s12 l4">
	                    <?php displayShareButtons($pageSettings) ?>
	                </div>
                <?php endif; ?>
            </div>