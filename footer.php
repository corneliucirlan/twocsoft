<?php

    /**
     * Footer template file
     *
     * @link https://codex.wordpress.org/Template_Hierarchy
     *
     * @package cornelius
     */


    // Security check
    if (!defined('ABSPATH')) die;

    $footerLogo = get_theme_mod('footer-custom-logo') ? get_theme_mod('footer-custom-logo') : null;

?>

        </div>

        <footer class="footer">
            <div class="container-fluid">
                <!-- Header navigation -->
                <nav class="navbar navbar-footer navbar-dark">
                    <?php
                        // Render footer menu
                        if (has_nav_menu('footer-menu')):
                            $args = array(
                                'theme_location' => 'footer-menu',
                                'menu' => 'footer-menu',
                                'container' => 'ul',
                                'menu_class' => 'navbar-nav navbar-nav-footer',
                                'echo' => true,
                                'fallback_cb' => 'wp_page_menu',
                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth' => 0,
                            );
                            wp_nav_menu($args);
                        endif;
                    ?>
                </nav>

                <div class="social-profiles row">
                    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                        <?php cornelius\core\Post::socialProfiles('social-icons-footer'); ?>
                    </div>
                </div>

                <div class="brand-footer row">
                    <div class="col-12 col-md-8 offset-md-2">
                        <?php if ($footerLogo): ?>
                            <img class="footer-logo custom-logo" src="<?php echo $footerLogo ?>" alt="<?php bloginfo('title') ?>" />
                        <?php endif; ?>
                        <span class="tagline tagline-footer"><?php bloginfo('description') ?></span>
                    </div>
                </div>

                <div class="copyright row">
                    <div class="col-12 col-md-8 offset-md-2">
                        <p class="copyright-text">Copyright &copy; <?php echo date('Y') . ' ' . get_bloginfo('name') ?>. All rights reserved.</p>
                    </div>
                </div>
            </div>

        </footer>

		<?php wp_footer() ?>
	</body>
</html>
