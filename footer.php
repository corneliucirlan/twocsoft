<?php

    /**
     * Footer template file
     *
     * @link https://codex.wordpress.org/Template_Hierarchy
     *
     * @package ccwp
     */


    // Security check
    if (!defined('ABSPATH')) die;

?>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">

                    <!-- Footer menu -->
                    <div class="col-xs-12 col-md-4">
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

                    <!-- Contact -->
                    <div class="col-xs-12 col-md-4">
                        <h2 class="footer-subtitle center-align">Let's work together</h2>
                        <p><?php echo get_option('footer_center_text') ?></p>
                    </div>

                    <!-- Social icons -->
                    <div class="col-xs-12 col-md-4">
                        <h2 class="footer-subtitle center-align">On social media</h2>
                        <?php ccwp\core\Tags::renderSocialProfiles('social-icons-footer', 'fa-2x'); ?>
                    </div>
            	</div>
            </div>

            <!-- Copyright -->
            <div class="footer-copyright col-xs-12">
            	<div class="container center-align">
            		Copyright &copy; <?php echo date('Y') ?> <?php bloginfo() ?>. All rights reserved.
            	</div>
          	</div>
		</footer>

		<?php wp_footer() ?>
	</body>
</html>
