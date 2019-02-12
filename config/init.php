<?php

    /**
     * Init class
     *
     * @package cornelius
     */

    namespace cornelius;

    use cornelius\core\post;
    use cornelius\core\widgets;
    use cornelius\core\cpt;
    use cornelius\api\settings;
    use cornelius\api\customizer;
    use cornelius\setup\setup;
    use cornelius\setup\enqueue;
    use cornelius\setup\menus;
    use cornelius\setup\remove;
    use cornelius\setup\login;
    use cornelius\custom\acfLoader;
    use cornelius\custom\themeSettings;
    use cornelius\custom\skills\skillsPage;
    use cornelius\custom\amp;
    use cornelius\custom\contact;

    class Init
    {
        private static $loaded = false;

        /**
         * Construct class to activate actions and hooks as soon as the class is initialized
         */
        public function __construct()
        {
            // Initialize all classes
            $this->initClasses();

            // Initialize custom post types
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
            new Post();
            new Widgets();
            new Settings();
            new Customizer();
            new Setup();
            new Enqueue();
            new Menus();
            new Remove();
            new Login();
            new ACFLoader();
            new ThemeSettings();

            // AMP pages
            new AMP();

            // Skills
            new SkillsPage();

            // Contact
            new Contact();
        }

        /**
         * Init Custom Post Types
         */
        public function initCustomPostTypes()
        {
            // Register Portfolio post type
            $portfolio = new CPT(array(
                'post_type_name'	=> POST_TYPE_PORTFOLIO,
                'singular'			=> __('Portfolio', 'cornelius'),
                'plural'			=> __('Portfolio', 'cornelius'),
                'slug'				=> POST_TYPE_PORTFOLIO
            ), array('has_archive' => false, 'menu_position' => 5));
        }
    }

?>
