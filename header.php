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

?>

<?php

	// Get header image
    if (is_singular(POST_TYPE_PORTFOLIO) && has_post_thumbnail()):
            $headerStyles = "background: url(".wp_get_attachment_url(get_post_thumbnail_id()).");
                background-position: center top;";
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
        box-shadow: inset 0 -10px 10px -10px rgba(0, 0, 0, 0.2);
        margin: 0;";

    $detect = new Mobile_Detect();
    if ($detect->isMobile() && !$detect->isTablet()):
            $headerHeight = "400px;";
        else:
            $headerHeight = "500px;";
    endif;
    $headerStyles .= "height: ".$headerHeight;

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

        <?php wp_head() ?>
    </head>

    <body <?php body_class() ?>>

		<!-- Header -->
        <header>
            <nav class="navbar fixed-top navbar-toggleable-md navbar-full navbar-light">

                <div class="container-fluid">

                    <!-- Navigation toggle -->
                    <button class="navbar-toggler navbar-toggler-left hidden-lg-up" type="button">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Logo -->
                    <?php echo function_exists('has_custom_logo') && has_custom_logo() ? get_custom_logo() : '<a class="navbar-brand custom-logo-link" href="'.esc_url(home_url()).'">'.get_bloginfo().'</a>'; ?>

                    <?php
                        // Render header menu
                        if (has_nav_menu('header-menu')):
                            $args = array(
                                'theme_location' => 'header-menu',
                                'menu' => 'header-menu',
                                'container' => 'ul',
                                'menu_class' => 'navbar-nav navbar-nav-left',
                                'echo' => true,
                                'fallback_cb' => 'wp_page_menu',
                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth' => 0,
                            );
                            wp_nav_menu($args);
                        endif;

                        // Social media profiles
                        ccwp\core\Tags::renderSocialProfiles('social-icons-header');
                    ?>

                </div>
            </nav>

            <!-- Header image -->
            <div class="header-image row" style="<?= $headerStyles ?>"><div class="header-overlay" style="width: 100%; height: <?php echo $headerHeight; ?>"></div></div>

            <!-- Breadcrumbs -->
            <div class="breadcrumbs-container container-fluid">
                <div class="row">
                    <div class="<?php echo $isSingular ? 'col' : 'col-xs-12 col-md-8' ?>">
                        <?php //renderBreadcrumbs() ?>
                    </div>
                    <?php if (!$isSingular): ?>
                        <div class="col-xs-12 col-md-4">
                            <?php ccwp\core\Tags::displayShareButtons($pageSettings) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="main-container container-fluid">
