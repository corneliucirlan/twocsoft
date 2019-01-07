<?php

    /**
    * This theme uses PSR-4 and OOP logic instead of procedural coding
    * Every function, hook and action is properly divided and organized inside related folders and files
    * Use the file `config/custom/custom.php` to write your custom functions
    *
    * @package ccwp
    */

    // Define theme version
    if (!defined('THEME_VERSION')):
        define('THEME_VERSION', '5.0');
    endif;

    // Define Portfolio post type
    if (!defined('POST_TYPE_PORTFOLIO')):
        define('POST_TYPE_PORTFOLIO', 'portfolio');
    endif;

    // Portfolio website item
    if (!defined('PORTFOLIO_WEBSITE')):
        define('PORTFOLIO_WEBSITE', 'portfolio-website');
    endif;

    // Portfolio plugin item
    if (!defined('PORTFOLIO_PLUGIN')):
        define('PORTFOLIO_PLUGIN', 'portfolio-plugin');
    endif;

    // Portfolio generic item
    if (!defined('PORTFOLIO_GENERIC')):
        define('PORTFOLIO_GENERIC', 'portfolio-generic');
    endif;

    // Portfolio page
    if (!defined('PAGE_PORTFOLIO')):
        define('PAGE_PORTFOLIO', 24);
    endif;

    // About page
    if (!defined('PAGE_ABOUT')):
        define('PAGE_ABOUT', 44);
    endif;

    // Contact page
    if (!defined('PAGE_CONTACT')):
        define('PAGE_CONTACT', 46);
    endif;

    // Services page
    if (!defined('PAGE_SERVICES')):
        define('PAGE_SERVICES', 149);
    endif;

    // Blog page
    if (!defined('PAGE_BLOG')):
        define('PAGE_BLOG', 179);
    endif;

    // PSR-4 Autoload
    if (file_exists(dirname(__FILE__).'/vendor/autoload.php')):
        require_once dirname(__FILE__).'/vendor/autoload.php';
    endif;

    // Init class
    if (class_exists('ccwp\\Init')):
        new \ccwp\Init();
    endif;

?>
