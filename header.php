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
                    <!-- <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">&#9776;</button> -->

                    <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
                        <?php

                            /**
                            * Filter the CSS class for a nav menu based on a condition.
                            *
                            * @param array  $classes The CSS classes that are applied to the menu item's <li> element.
                            * @param object $item    The current menu item.
                            * @return array (maybe) modified nav menu class.
                            */
                            function wpdocs_special_nav_class($classes, $item)
                            {
                                // to be added later - "active" class to the active page
                                $classes[] = "nav-item";
                                return $classes;
                            }
                            add_filter('nav_menu_css_class' , 'wpdocs_special_nav_class' , 10, 2);

                            /**
                             * Add custom class to menu anchor tags
                             */
                            function my_walker_nav_menu_start_el($item_output, $item, $depth, $args)
                            {
                                $item_output = preg_replace('/<a /', '<a class="nav-link" ', $item_output, 1);
                                return $item_output;
                            }
                            add_filter('walker_nav_menu_start_el', 'my_walker_nav_menu_start_el', 10, 4);

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
                    </div>

                    <!-- Social media -->
                    <!-- <div class="pull-right">
			      		<ul class="footer-follow-us">
                            <li><a class="facebook" target="_blank" href="https://www.facebook.com/corneliucirlan" title="Follow me on Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="twitter" target="_blank" href="https://twitter.com/corneliucirlan" title="Follow me on Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="google-plus" target="_blank" href="https://plus.google.com/+CorneliuCirlan" title="Follow me on Google+"><i class="fa fa-google-plus"></i></a></li>
                            <li><a class="linkedin" target="_blank" href="https://www.linkedin.com/in/corneliucirlan" title="Follow me on Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
			      	</div> -->
                </div>
            </nav>

            <div class="row" style="background: url(<?php echo $headerImage ?>); top center no-repeat; color: white; background-size: cover; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; max-height: 100%; max-width: 100%; min-height: 500px; min-height: 50rem; padding: 0px; margin: -64px 0 0; background-attachment: fixed;">
            </div>

            <div class="container-fluid">
                <div class="no-padding-left col-xs-12 <?php echo $isSingular ? 'col-md-12 col-lg-12' : 'col-md-8 col-lg-8' ?>">
                    <?php renderBreadcrumbs() ?>
                </div>
                <?php if (!$isSingular): ?>
                    <div class="no-padding-right col-xs-12 col-md-4 col-lg-4">
                        <?php displayShareButtons($pageSettings) ?>
                    </div>
                <?php endif; ?>

                <!-- <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Library</li>
                </ul> --> 
            </div>
        </header>
