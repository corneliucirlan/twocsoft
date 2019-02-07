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

    $footerLogo = get_theme_mod('footer-custom-logo') ? get_theme_mod('footer-custom-logo') : null;

?>

        </div>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="brand col-12 col-md-6 col-lg-4">
                        <?php if ($footerLogo): ?>
                            <img class="custom-logo" src="<?php echo $footerLogo ?>" alt="<?php bloginfo('title') ?>" />
                        <?php endif; ?>
                        <h5 class="footer-title"><?php bloginfo('description') ?></h5>
                    </div>

                    <div class="contact col-12 col-md-6 col-lg-4">
                        <h2 class="footer-title">GET IN TOUCH</h2>
                        <div class="contact-info">
                            <a class="footer-link" href="mailto:<?php bloginfo('admin_email') ?>" target="_blank"><?php bloginfo('admin_email') ?></a>
                        </div>
                    </div>

                    <div class="social col-12 col-lg-4">
                        <h2 class="footer-title">FOLLOW US</h2>
                        <?php ccwp\core\Post::socialProfiles('social-icons-footer', 'fa-2x'); ?>
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
