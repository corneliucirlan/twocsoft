<!DOCTYPE html>
<html <?php language_attributes() ?>>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php wp_title() ?></title>

      	<?php wp_head() ?>
     </head>

	<body>
        
        <!-- HEADER -->
        <header>
            <nav class="navbar navbar-default" role="navigation">
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
                                    'menu_class' => 'nav navbar-nav navbar-right',
                                    'menu_id' => '',
                                    'echo' => true,
                                    'fallback_cb' => false,
                                    'before' => '',
                                    'after' => '',
                                    'link_before' => '',
                                    'link_after' => '',
                                    'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
                                    'depth' => 1,
                                    'walker' => ''
                                ));
                            ?>
                    </div>
                </div>
            </nav>
        </header>

        <!-- MAIN CONTENT -->
        <main class="container-fluid" role="main">
            <!-- <h1 <?php echo is_front_page() || is_home() ? 'class="frontpage-title"' : '' ?>><?php is_front_page() || is_home() ? bloginfo() : the_title() ?></h1> -->
            <?php if (!is_front_page() && !is_home()) echo '<h1>'.get_the_title().'</h1>'; ?>