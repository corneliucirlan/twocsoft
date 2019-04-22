<?php

    /**
     * Enqueue class
     *
     * @package cornelius
     */

    namespace cornelius\setup;

    class Enqueue
    {
        /*
            Contrusct class to activate actions and hooks as soon as the class is initialized
        */
        public function __construct()
        {
            // Load custom css into wp_head
            // add_action('wp_head', array($this, 'loadWPHead'));

            // Enqueue into wp_footer
            add_action('wp_footer', array($this, 'loadWPFooter'));

            // Enqueue scripts
            add_action('wp_enqueue_scripts', array($this, 'enqueueScripts'));
        }

        /**
         * Load into wp_head
         */
        public function loadWPHead()
        {
            ?>
            <style>
                body.body-logged-in .fixed-top { top: 46px !important; }
                body.logged-in .fixed-top { top: 46px !important; }
                @media only screen and (min-width: 783px) {
                    body.body-logged-in .fixed-top { top: 28px !important; }
                    body.logged-in .fixed-top { top: 28px !important; }
                }
                </style>
            <?php
        }

        /**
         * Enqueue into wp_footer
         */
        public function loadWPFooter()
        {
            // Define ajaxurl
            if (is_page(PAGE_CONTACT)):
                ?><script type="text/javascript">var ajaxurl ='<?php echo admin_url('admin-ajax.php'); ?>';</script><?php
            endif;
        }

        /**
         * Enqueue scripts
         */
        public function enqueueScripts()
        {
            // Deregister the built-in version of jQuery from WordPress
            wp_deregister_script('jquery');

            // Register latest version of jQuery
            wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js', array(), false, true);

            // CSS
            wp_enqueue_style('main', get_template_directory_uri().'/assets/css/style.min.css', array(), THEME_VERSION, 'all');

            // JS
            wp_enqueue_script('main', get_template_directory_uri().'/assets/js/javascript.min.js', array('jquery'), THEME_VERSION, true);

            // jQuery Migrate
            wp_deregister_script('jquery-migrate');

            // WP Embed
            wp_deregister_script('wp-embed');

            // Extra
            // if (is_singular() && comments_open() && get_option('thread_comments')):
            //     wp_enqueue_script('comment-reply');
            // endif;
        }
    }

?>
