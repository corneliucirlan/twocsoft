<?php

    /**
     * Custom Fields class
     *
     * @package ccwp
     */

    namespace ccwp\custom;

    use ccwp\api\settings;
    use ccwp\api\callback\customFieldsCallbacks;
    use ccwp\api\callback\socialMediaCallbacks;
    use ccwp\api\callback\skillsCallbacks;

    class ThemeSettings extends Settings
    {
        // Social media sites
        private $socialSites = array('facebook', 'instagram', 'twitter', 'google_plus', 'linkedin', 'github');

        /**
         * Custom Fields callbacks
         *
         * Variable that holds all callbacks for the custom fields
         *
         * @var [type]
         */
        private $customFieldsCallbacks;

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
            $this->customFieldsCallbacks = new CustomFieldsCallbacks();
            $this->socialMediaCallbacks = new SocialMediaCallbacks();

            // Admin enqueue
            $this->enqueue();

            // Register pages
            // $this->registerPages();

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
                //     'media_uplaoder',
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
         * Register pages
         */
        public function registerPages()
        {
            // Init pages
            $pages = array();

            // Skills page
            $pages[] = array(
                'page_title'    => __('Skills'),
                'menu_title'    => __('Skills'),
                'capability'    => 'manage_options',
                'menu_slug'     => 'skills',
                'callback'      => array($this->skillsCallbacks, 'renderSkillsPage'),
                'icon_url'      => '',
                'position'      => 15
            );

            // Parent call
            parent::addAdminPages($pages);
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
                'page_title'        => 'Social Media',
                'menu_title'        => 'Social media',
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

            // Social media links
            foreach ($this->socialSites as $site):
                $settings[] = array(
                    'option_group'      => 'general',
                    'option_name'       => $site.'_link',
                    'callback'          => ''
                );
            endforeach;

            // Bitly API Key
            $settings[] = array(
                'option_name'       => 'general',
                'option_group'      => 'bitly_api_key',
                'callback'          => ''
            );

            // Github client ID
            $settings[] = array(
                'option_name'       => 'general',
                'option_group'      => 'github_client_id',
                'callback'          => ''
            );

            // Github client secret
            $settings[] = array(
                'option_name'       => 'general',
                'option_group'      => 'github_client_secret',
                'callback'          => ''
            );

            // Facebook API
            $settings[] = array(
                'option_name'       => 'general',
                'option_group'      => 'facebook_access_token',
                'callback'          => ''
            );

            // Instagram API
            $settings[] = array(
                'option_name'       => 'general',
                'option_group'      => 'instagram_access_token',
                'callback'          => ''
            );

            // Instagram user ID
            $settings[] = array(
                'option_name'       => 'general',
                'option_group'      => 'instagram_user_id',
                'callback'          => ''
            );

            // Twitter API
            $settings[] = array(
                'option_name'       => 'general',
                'option_group'      => 'twitter_oauth_access_token',
                'callback'          => ''
            );
            $settings[] = array(
                'option_name'       => 'general',
                'option_group'      => 'twitter_oauth_access_token_secret',
                'callback'          => ''
            );
            $settings[] = array(
                'option_name'       => 'general',
                'option_group'      => 'twitter_customer_key',
                'callback'          => ''
            );
            $settings[] = array(
                'option_name'       => 'general',
                'option_group'      => 'twitter_customer_secret',
                'callback'          => ''
            );

            // Social media shares
            $settings[] = array(
                'option_group'  => self::SOCIAL_MEDIA_GROUP,
                'option_name'   => self::SOCIAL_MEDIA_SHARE_NAME,
                'callback'      => array($this->socialMediaCallbacks, 'validateSocialMediaShareSettings'),
            );

            // Social media profiles
            // $settings[] = array(
            //     'option_group'  => self::SOCIAL_MEDIA_GROUP,
            //     'option_name'   => self::SOCIAL_MEDIA_NAME,
            //     'callback'      => array($this->socialMediaCallbacks, 'validateSocialMediaSettings'),
            // );

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
                'title'     => __('Social media links'),
                'callback'  => '',
                'page'      => 'general'
            );

            // API KEYs
            $sections[] = array(
                'id'        => 'api_keys',
                'title'     => __('API KEYs'),
                'callback'  => '',
                'page'      => 'general'
            );

            // Social media shares
            $sections[] = array(
                'id'        => self::SOCIAL_MEDIA_SHARE_SECTION,
                'title'     => __('Social Media Share Sites', 'cornelius'),
                'callback'  => array($this->socialMediaCallbacks, 'socialMediaShare'),
                'page'      => self::SOCIAL_MEDIA_SLUG
            );

            // Social Media Profiles settings
            // $sections[] = array(
            //     'id'        => self::SOCIAL_MEDIA_SECTION,
            //     'title'     => __('Social Media Profiles', 'wordtravel'),
            //     'callback'  => array($this->socialMediaCallbacks, 'socialMediaProfiles'),
            //     'page'      => self::SOCIAL_MEDIA_SLUG
            // );

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
                'title'     => __('Footer center text'),
                'callback'  => array($this->customFieldsCallbacks, 'displayFooterCenterText'),
                'page'      => 'reading',
                'section'   => 'default',
                'args'      => array(),
            );

            // Social media links
            foreach ($this->socialSites as $site):
                $fields[] = array(
                    'id'        => $site.'_link',
                    'title'     => ucwords(str_replace("_", " ", $site)),
                    'callback'  => array($this->customFieldsCallbacks, 'displayCustomFieldInput'),
                    'page'      => 'general',
                    'section'   => 'social_media_links',
                    'args'      => array(
                        'link'  => $site.'_link',
                    )
                );
            endforeach;

            // Access tokens
            $apiKeys = array(
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

            foreach ($apiKeys as $key => $value):
                $fields[] = array(
                    'id'        => $key,
                    'title'     => $value,
                    'callback'  => array($this->customFieldsCallbacks, 'displayCustomFieldInput'),
                    'page'      => 'general',
                    'section'   => 'api_keys',
                    'args'      => array(
                        'link'  => $key
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

            // Social media profiles
            // $socialMediaProfiles = $this->socialMediaCallbacks::SOCIAL_MEDIA_SITES;
            // foreach ($socialMediaProfiles as $profile => $value):
            //     $title = ucwords(str_replace('-', ' ', $profile));
            //     $fields[] = array(
            //         'id'        => 'wordtravel-smp-'.$profile,
            //         'title'     => $title,
            //         'callback'  => array($this->socialMediaCallbacks, 'renderSocialMefiaSite'),
            //         'page'      => self::SOCIAL_MEDIA_SLUG,
            //         'section'   => self::SOCIAL_MEDIA_SECTION,
            //         'args'      => array(
            //             'label_for' => 'wordtravel-smp-'.$profile,
            //             'profile'   => array(
            //                 'site'      => $profile,
            //                 'enabled'   => isset($enabledSocialMediaProfiles[$profile]['enabled'])  ? 1 : 0,
            //                 'title'     => isset($enabledSocialMediaProfiles[$profile]['title']) ? $enabledSocialMediaProfiles[$profile]['title'] : sprintf(__('Follow me on %s', 'wordtravel'), $title),
            //                 'url'       => isset($enabledSocialMediaProfiles[$profile]['url']) ? $enabledSocialMediaProfiles[$profile]['url'] : '',
            //             )
            //         )
            //     );
            // endforeach;

            // Parent call
            parent::addFields($fields);
        }
    }

?>
