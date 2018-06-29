<?php

    /**
     * ACF Loader class
     *
     * @package ccwp
     */

    namespace ccwp\custom;

    class AMP
    {
        /**
         * Construct class to activate actions and hooks as soon as the class is initialized
         */
        public function __construct($hide = false)
        {
            // Remove Google Fonts
            add_action('amp_post_template_head', array($this, 'removeGoogleFonts'), 2);

            // Add fonts
            add_action('amp_post_template_css', array($this, 'addFonts'));

            // Load AMP template
            add_filter('amp_post_template_file', array($this, 'loadAMPTemplate'), 10, 3);
        }

        /**
         * Remove Google Fonts
         */
        public function removeGoogleFonts()
        {
            remove_action('amp_post_template_head', 'amp_post_template_add_fonts');
        }

        /**
         * Add fonts
         */
        public function addFonts($amp_template)
        {
            ?>
            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif
            }

            @font-face {
                font-family: 'FontAwesome';
                src: url("<?php echo get_template_directory_uri() ?>/assets/fonts/fontawesome-webfont.eot?v=4.7.0");
                src: url("<?php echo get_template_directory_uri() ?>/assets/fonts/fontawesome-webfont.eot?#iefix&v=4.7.0") format("embedded-opentype"),
                     url("<?php echo get_template_directory_uri() ?>/assets/fonts/fontawesome-webfont.woff2?v=4.7.0") format("woff2"),
                     url("<?php echo get_template_directory_uri() ?>/assets/fonts/fontawesome-webfont.woff?v=4.7.0") format("woff"),
                     url("<?php echo get_template_directory_uri() ?>/assets/fonts/fontawesome-webfont.ttf?v=4.7.0") format("truetype"),
                     url("<?php echo get_template_directory_uri() ?>/assets/fonts/fontawesome-webfont.svg?v=4.7.0#fontawesomeregular") format("svg");
                font-weight: normal;
                font-style: normal;
            }
            <?php
        }

        /**
         * Load AMP template
         */
        public function loadAMPTemplate($file, $type, $post)
        {
            if ('single' === $type)
     			$file = get_template_directory().'/templates/content-amp.php';

        	return $file;
        }
    }

?>
