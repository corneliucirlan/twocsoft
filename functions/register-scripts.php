<?php

    add_action('wp_enqueue_scripts', function() {

        // Main stylesheet
        wp_register_style('main-style', THEME_URI.'style.css', '', '', 'all');

        // JS functions
        wp_register_script('js-functions', THEME_URI.'js/functions-dist.js', '', '', true);

        // jQuery
        wp_deregister_script('jquery');

        // jQuery Migrate
        wp_deregister_script('jquery-migrate');

        // WP Embed
        wp_deregister_script('wp-embed');
    });

?>
