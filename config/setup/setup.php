<?php

    /**
     * Setup class
     *
     * @package ccwp
     */

    namespace ccwp\setup;

    // WP_Customize_Image_Control class
    use WP_Customize_Image_Control;

    class Setup
    {
        /**
         * Contrusct class to activate actions and hooks as soon as the class is initialized
         */
        public function __construct()
        {
            add_action('after_setup_theme', array($this, 'setup'));

            // Define content width
            add_action('after_setup_theme', array($this, 'contentWidth'), 0);

            // Add custom logos
            add_action('customize_register', array($this, 'addCustomLogos'));
        }

        public function setup()
        {
            // Activate this if building a multilingual theme
            // load_theme_textdomain('ccwp', get_template_directory() . '/languages' );

            // Default Theme Support options better have
            add_theme_support('automatic-feed-links');
            add_theme_support('title-tag');
            add_theme_support('custom-logo');
            add_theme_support('custom-header');
            add_theme_support('post-thumbnails');
            add_theme_support('html5', array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ));
            add_theme_support('custom-background', array(
                'default-color' => 'ffffff',
                'default-image' => '',
            ));
            // add_theme_support('post-formats', array(
            //     'aside',
            //     'gallery',
            //     'link',
            //     'image',
            //     'quote',
            //     'status',
            //     'video',
            //     'audio',
            //     'chat',
            // ));
        }

        /**
         *    Define a max content width to allow WordPress to properly resize your images
         */
        public function contentWidth()
        {
            $GLOBALS['content_width'] = apply_filters('content_width', 1500);
        }

        public function addCustomLogos($wp_customize)
        {
            // add a setting
            $wp_customize->add_setting('mobile-custom-logo');
            $wp_customize->add_setting('footer-custom-logo');

            // Add a control to upload the mobile logo
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mobile-custom-logo', array(
                'label' => 'Mobile Logo',
                'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
                'settings' => 'mobile-custom-logo',
                'priority' => 8 // show it just below the custom-logo
            )));

            // Add a control to upload the footer logo
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer-custom-logo', array(
                'label' => 'Footer Logo',
                'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
                'settings' => 'footer-custom-logo',
                'priority' => 8 // show it just below the custom-logo
            )));
        }
    }

?>
