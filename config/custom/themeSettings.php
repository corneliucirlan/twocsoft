<?php

    /**
     * Custom Fields class
     *
     * @package ccwp
     */

    namespace ccwp\custom;

    use ccwp\api\settings;
    use ccwp\api\callback\socialMediaCallbacks;

    class ThemeSettings extends Settings
    {
        // Social media sites
        private $socialSites;

        // Social media API
        private $socialAPIs;

        /**
         * Social Media callbacks
         *
         * Variable that holds all callbacks for social media
         *
         * @var [type]
         */
        private $socialMediaCallbacks;

        /**
         * Social media settings constants
         *
         * @since 1.0
         */
        const SOCIAL_MEDIA_GROUP    = 'social-media-group';
        const SOCIAL_MEDIA_SECTION  = 'social-media-section';
        const SOCIAL_MEDIA_SLUG     = 'social-media-settings';
        const SOCIAL_MEDIA_NAME     = 'social_media_profiles';
        const SOCIAL_MEDIA_SHARE_SECTION = 'sms-section';
        const SOCIAL_MEDIA_SHARE_NAME    = 'sms_profiles';


        /**
         * Contrusct class to activate actions and hooks as soon as the class is initialized
         */
        public function __construct()
        {
            // Init callbacks
            $this->socialMediaCallbacks = new SocialMediaCallbacks();

            $this->socialSites = array('facebook', 'instagram', 'twitter', 'behance', 'linkedin', 'github');
            $this->socialAPIs = array(
                'bitly_api_key'                     => __('Bitly API key'),
                'github_client_id'                  => __('Github client ID'),
                'github_client_secret'              => __('Github client secret'),
                'facebook_access_token'             => __('Facebook access token'),
                'instagram_access_token'            => __('Instagram access token'),
                'instagram_user_id'                 => __('Instagram usesr ID'),
                'twitter_oauth_access_token'        => __('Twitter access token'),
                'twitter_oauth_access_token_secret' => __('Twitter access token secret'),
                'twitter_customer_key'              => __('Twitter customer key'),
                'twitter_customer_secret'           => __('Twitter customer secret'),
            );

            // Admin enqueue
            $this->enqueue();

            // Register subpages
            $this->registerSubPages();

            // Register settings
            $this->registerSettings();

            // Register sections
            $this->registerSections();

            // Register fields
            $this->registerFields();

            // Parent call
            parent::__construct();
        }

        /**
         * Admin enqueue
         */
        private function enqueue()
        {
            $scripts = array(
                'script' => array(
                    'jquery',
                    get_template_directory_uri() . '/assets/js/wp-admin.js'
                ),
                'style' => array(
                    get_template_directory_uri() . '/assets/css/wp-admin.css',
                )
            );

            // Pages array to where enqueue scripts
            $pages = array('settings_page_'.self::SOCIAL_MEDIA_SLUG);

            // Enqueue files in Admin area
            parent::adminEnqueue($scripts, $pages);
        }

        /**
         * Register subpages
         */
        public function registerSubPages()
        {
            // Init subpages
            $adminSubPages = array();

            // Social media shares
            $adminSubPages[] = array(
                'parent_slug'       => 'options-general.php',
                'page_title'        => __('Social Media', 'cornelius'),
                'menu_title'        => __('Social Media', 'cornelius'),
                'capability'        => 'manage_options',
                'menu_slug'         => self::SOCIAL_MEDIA_SLUG,
                'callback'          => array($this->socialMediaCallbacks, 'submenuSocialMediaPage')
            );

            // Parent call
            parent::addAdminSubpages($adminSubPages);
        }

        /**
         * Register settings
         */
        public function registerSettings()
        {
            // Init settings
            $settings = array();

            // Footer center text
            $settings[] = array(
                'option_group'      => 'reading',
                'option_name'       => 'footer_center_text',
                'callback'          => '',
            );

            // Links
            foreach ($this->socialSites as $site):
                $settings[] = array(
                    'option_group'      => self::SOCIAL_MEDIA_GROUP,
                    'option_name'       => $site.'_link',
                );
            endforeach;

            // API
            foreach ($this->socialAPIs as $key => $value):
                $settings[] = array(
                    'option_group'       => self::SOCIAL_MEDIA_GROUP,
                    'option_name'      => $key,
                );
            endforeach;

            // Shares
            $settings[] = array(
                'option_group'  => self::SOCIAL_MEDIA_GROUP,
                'option_name'   => self::SOCIAL_MEDIA_SHARE_NAME,
            );

            // Parent call
            parent::addSettings($settings);
        }

        /**
         * Register sections
         */
        public function registerSections()
        {
            // Init sections
            $sections = array();

            // Social media links
            $sections[] = array(
                'id'        => 'social_media_links',
                'title'     => __('Links', 'cornelius'),
                'callback'  => array($this->socialMediaCallbacks, 'socialMediaLinksSection'),
                'page'      => self::SOCIAL_MEDIA_SLUG
            );

            // API KEYs
            $sections[] = array(
                'id'        => 'api_keys',
                'title'     => __('API KEYs'),
                'callback'  => array($this->socialMediaCallbacks, 'socialAPISection'),
                'page'      => self::SOCIAL_MEDIA_SLUG
            );

            // Social media shares
            $sections[] = array(
                'id'        => self::SOCIAL_MEDIA_SHARE_SECTION,
                'title'     => __('Share', 'cornelius'),
                'callback'  => array($this->socialMediaCallbacks, 'socialMediaShareSection'),
                'page'      => self::SOCIAL_MEDIA_SLUG
            );

            // Parent call
            parent::addSections($sections);
        }

        /**
         * Register fields
         */
        public function registerFields()
        {
            // Init fields array
            $fields = array();

            // Footer center text
            $fields[] = array(
                'id'        => 'footer_center_text',
                'title'     => __('Footer center text', 'cornelius'),
                'callback'  => function() { wp_editor(get_option('footer_center_text') ? get_option('footer_center_text') : '', 'footer_center_text'); },
                'page'      => 'reading',
                'section'   => 'default',
                'args'      => array(),
            );

            // Social media links
            foreach ($this->socialSites as $site):
                $fields[] = array(
                    'id'        => $site.'_link',
                    'title'     => ucwords(str_replace("_", " ", $site)),
                    'callback'  => array($this->socialMediaCallbacks, 'displayCustomFieldInput'),
                    'page'      => self::SOCIAL_MEDIA_SLUG,
                    'section'   => 'social_media_links',
                    'args'      => array(
                        'link'      => $site.'_link',
                        'label_for' => $site.'_link',
                    )
                );
            endforeach;

            foreach ($this->socialAPIs as $key => $value):
                $fields[] = array(
                    'id'        => $key,
                    'title'     => $value,
                    'callback'  => array($this->socialMediaCallbacks, 'displayCustomFieldInput'),
                    'page'      => self::SOCIAL_MEDIA_SLUG,
                    'section'   => 'api_keys',
                    'args'      => array(
                        'link'      => $key,
                        'label_for' => $key,
                    )
                );
            endforeach;

            // Social media shares
            $fields[] = array(
                'id'        => self::SOCIAL_MEDIA_SHARE_NAME,
                'title'     => __('Enable sharing on', 'cornelius'),
                'callback'  => array($this->socialMediaCallbacks, 'renderSocialMediaShare'),
                'page'      => self::SOCIAL_MEDIA_SLUG,
                'section'   => self::SOCIAL_MEDIA_SHARE_SECTION,
                'args'      => array(
                    'label_for' => self::SOCIAL_MEDIA_SHARE_NAME
                )
            );

            // Parent call
            parent::addFields($fields);
        }
    }

?>
