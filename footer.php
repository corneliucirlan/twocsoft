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
                    if (has_nav_menu('footer-menu'))
                        wp_nav_menu(array(
                            'theme_location' => 'footer-menu',
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
			<div class="contact-us col-md-4">
				<p><?php echo get_option('footer_center_text') ?></p>
			</div>
			<div class="footer-copyright col-md-4">
				<ul class="footer-follow-us">
                    <li><a class="facebook" target="_blank" href="https://www.facebook.com/corneliucirlan" title="Follow me on Facebook"><i class="fa fa-facebook fa-2x"></i></a></li>
                    <li><a class="twitter" target="_blank" href="https://twitter.com/corneliucirlan" title="Follow me on Twitter"><i class="fa fa-twitter fa-2x"></i></a></li>
                    <li><a class="google-plus" target="_blank" href="https://plus.google.com/+CorneliuCirlan" title="Follow me on Google+"><i class="fa fa-google-plus fa-2x"></i></a></li>
                    <li><a class="linkedin" target="_blank" href="https://www.linkedin.com/in/corneliucirlan" title="Follow me on Linkedin"><i class="fa fa-linkedin fa-2x"></i></a></li>
                </ul>
                <p>Copyright &copy; <?php echo date('Y') ?> <a href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a></p>
			</div>
        </footer>
        
        <?php wp_footer() ?>
    </body>
</html>