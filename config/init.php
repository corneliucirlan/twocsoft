<?php

    /**
     * Init class
     *
     * @package ccwp
     */

    namespace ccwp;

    use ccwp\core\tags;
    use ccwp\core\widgets;
    use ccwp\core\cpt;
    use ccwp\api\settings;
    use ccwp\api\customizer;
    use ccwp\setup\setup;
    use ccwp\setup\enqueue;
    use ccwp\setup\menus;
    use ccwp\setup\remove;
    use ccwp\setup\login;
    use ccwp\custom\acfLoader;
    use ccwp\custom\themeSettings;
    use ccwp\custom\skills\skillsPage;

    class Init
    {
        private static $loaded = false;

        /**
         * Construct class to activate actions and hooks as soon as the class is initialized
         */
        public function __construct()
        {
            $this->initClasses();

            $this->initCustomPostTypes();
        }

        /**
         * Initialise classes
         */
        public function initClasses()
        {
            // Check if class was already loaded
            if (self::$loaded) return;

            // Set loaded flag
            self::$loaded = true;

            // Call classes
            new Tags();
            new Widgets();
            new Settings();
            new Customizer();
            new Setup();
            new Enqueue();
            new Menus();
            new Remove();
            new Login();
            new ACFLoader(true);
            new ThemeSettings();

            new SkillsPage();
        }

        /**
         * Init Custom Post Types
         */
        public function initCustomPostTypes()
        {
            // Register Portfolio post type
            $portfolio = new CPT(array(
                'post_type_name'	=> POST_TYPE_PORTFOLIO,
                'singular'			=> 'Portfolio',
                'plural'			=> 'Portfolio',
                'slug'				=> POST_TYPE_PORTFOLIO
            ), array('has_archive' => false, 'menu_position' => 5));
        }
    }

?>
