<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

            </div>
		</div>

		<!-- FOOTER -->
        <footer class="row">
			<div class="col-md-4">
				<nav class="navbar navbar-inverse">
				<?php
                    if (has_nav_menu('header-menu'))
                        wp_nav_menu(array(
                            'theme_location' => 'header-menu',
                            'container' => 'ul',
                            'container_class' => '',
                            'container_id' => 'footer-menu',
                            'menu_class' => 'nav navbar-nav',
                            'menu_id' => '',
                            'echo' => true,
                            'fallback_cb' => false,
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
                            'depth' => 2,
                            'walker' => ''
                        ));
                    ?>
				</nav>
			</div>
			<div class="col-md-4">
				<p>Having problems with your website on want to create a whole new one? <a href="<?php the_permalink(PAGE_CONTACT); ?>">Contact us</a>, we can help.</p>
			</div>
			<div class="footer-copyright col-md-4">
				<ul class="footer-follow-us">
                    <li><a class="facebook" target="_blank" href="https://www.facebook.com/TwoCSoft-226215330901146" title="Follow us on Facebook"><i class="fa fa-facebook fa-2x"></i></a></li>
                    <li><a class="twitter" target="_blank" href="https://twitter.com/twocsoft" title="Follow us on Twitter"><i class="fa fa-twitter fa-2x"></i></a></li>
                    <li><a class="google-plus" target="_blank" href="https://plus.google.com/106197722229308309686/about" title="Follow us on Google+"><i class="fa fa-google-plus fa-2x"></i></a></li>
                    <li><a class="linkedin" target="_blank" href="https://www.linkedin.com/company/twocsoft" title="Follow us on Linkedin"><i class="fa fa-linkedin fa-2x"></i></a></li>
                </ul>
                <p>Copyright &copy; <?php echo date('Y') ?> <a href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a></p>
			</div>
        </footer>
        
        <?php wp_footer() ?>
    </body>
</html>