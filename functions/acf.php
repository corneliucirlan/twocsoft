<?php

    // 1. customize ACF path
    add_filter('acf/settings/path', 'my_acf_settings_path');
    function my_acf_settings_path($path)
    {
        // update path
        $path = get_stylesheet_directory() . '/functions/acf/';

        // return
        return $path;
    }

    // 2. customize ACF dir
    add_filter('acf/settings/dir', 'my_acf_settings_dir');
    function my_acf_settings_dir($dir)
    {
        // update path
        $dir = get_stylesheet_directory_uri() . '/functions/acf/';

        // return
        return $dir;
    }

    // 3. Hide ACF field group menu item
    //add_filter('acf/settings/show_admin', '__return_false');  -- v5
    add_action('admin_menu', 'remove_acf_menu', 999);
    function remove_acf_menu()
    {
        remove_menu_page('edit.php?post_type=acf');
    }

    // 4. Include ACF
    include_once(get_stylesheet_directory() . '/functions/acf/acf.php');

?>
