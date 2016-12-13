<?php

    add_action('wp_enqueue_scripts', function() {

        // Main stylesheet
        wp_register_style('main-style', THEME_URI.'style.css', '', '', 'all');

        // JS functions
        wp_register_script('js-functions', THEME_URI.'js/functions-dist.js', '', '', true);

        // PrismJS
        wp_register_style('prism-css', THEME_URI.'libs/prismjs/prism.css', '', '', 'all');

        // WP Embed
        wp_deregister_script('wp-embed');
    });

?>
