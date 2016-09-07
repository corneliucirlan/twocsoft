<?php

    add_action('wp_enqueue_scripts', function() {

        // Main stylesheet
        wp_register_style('main-style', THEME_URI.'style.css', '', '', 'all');

        // jQuery Mobile
        wp_register_script('jquery-mobile', '//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js', array('jquery'), '', true);

        // Mobile menu
        wp_register_script('mobile-menu', THEME_URI.'libs/mdstrap/jquery-mdstrap.js', array('jquery', 'jquery-mobile'), '', true);

        // JS functions
        wp_register_script('js-functions', THEME_URI.'js/functions.js', array('jquery', 'mobile-menu'), '', true);

        // Images loaded
        wp_register_script('images-loaded', THEME_URI.'libs/images-loaded/imagesloaded.pkgd.min.js', array('jquery'), '', true);

        // PrismJS
        wp_register_style('prism-css', THEME_URI.'libs/prismjs/prism.css', '', '', 'all');
        wp_register_script('prism-js', THEME_URI.'libs/prismjs/prism.js', array('jquery'), '', true);
    });

?>
