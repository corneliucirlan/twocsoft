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
                    <div class="brand col-12 col-md-6 col-lg-4">
                        <img class="footer-logo" src="<?php echo get_template_directory_uri() ?>/assets/img/footer-logo.png" alt="<?php bloginfo('title') ?>" />
                        <h5 class="footer-title"><?php bloginfo('description') ?></h5>
                    </div>

                    <div class="contact col-12 col-md-6 col-lg-4">
                        <h2 class="footer-title">GET IN TOUCH</h2>
                        <div class="contact-info">
                            <a class="footer-link" href="mailto:corneliu@corneliucirlan.com" target="_blank">corneliu@corneliucirlan.com</a>
                        </div>
                    </div>

                    <div class="social col-12 col-lg-4">
                        <h2 class="footer-title">FOLLOW US</h2>
                        <?php ccwp\core\Tags::renderSocialProfiles('social-icons-footer', 'fa-2x'); ?>
                    </div>
                </div>
            </div>

            <!-- Header navigation -->
            <nav class="navbar navbar-dark">
                <?php
                    // Render footer menu
                    if (has_nav_menu('footer-menu')):
                        $args = array(
                            'theme_location' => 'footer-menu',
                            'menu' => 'footer-menu',
                            'container' => 'ul',
                            'menu_class' => 'navbar-nav',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth' => 0,
                        );
                        wp_nav_menu($args);
                    endif;
                ?>
            </nav>
        </footer>

		<?php wp_footer() ?>
	</body>
</html>
