<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

        </div>
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-4 col-lg-4">
                        <h2 class="footer-subtitle center-align">Links</h2>
                        <?php
                            if (has_nav_menu('footer-menu')):
                               
                                // desktop menu
                                $args = array(
                                    'theme_location' => 'footer-menu',
                                    'menu' => 'footer-menu',
                                    'container' => 'ul',
                                    'menu_class' => 'footer-menu',
                                    'echo' => true,
                                    'fallback_cb' => 'wp_page_menu',
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'depth' => 0,
                                );
                                wp_nav_menu($args);
                            endif;
                        ?>
                    </div>
                    <div class="contact-us col-xs-12 col-md-4 col-lg-4">
                        <h2 class="footer-subtitle center-align">Let's work together</h2>
                        <p><?php echo get_option('footer_center_text') ?></p>
                    </div>
                    <div class="col-xs-12 col-md-4 col-lg-4">
                        <h2 class="footer-subtitle center-align">On social media</h2>
                        <ul class="footer-follow-us">
                            <li><a class="facebook" target="_blank" href="https://www.facebook.com/corneliucirlan" title="Follow me on Facebook"><i class="fa fa-facebook fa-2x"></i></a></li>
                            <li><a class="twitter" target="_blank" href="https://twitter.com/corneliucirlan" title="Follow me on Twitter"><i class="fa fa-twitter fa-2x"></i></a></li>
                            <li><a class="google-plus" target="_blank" href="https://plus.google.com/+CorneliuCirlan" title="Follow me on Google+"><i class="fa fa-google-plus fa-2x"></i></a></li>
                            <li><a class="linkedin" target="_blank" href="https://www.linkedin.com/in/corneliucirlan" title="Follow me on Linkedin"><i class="fa fa-linkedin fa-2x"></i></a></li>
                        </ul>    
                    </div>
            	</div>
          	</div>
          	<div class="footer-copyright">
            	<div class="container center-align">
            		Copyright © <?php echo date('Y').' '.get_bloginfo() ?>
            	</div>
          	</div>
		</footer>

		<?php wp_footer() ?>
	</body>
</html>