<?php

    /**
     * Custom Fields class
     *
     * @package ccwp
     */

    namespace ccwp\custom;

    use ccwp\api\settings;
    use ccwp\api\callback\customFieldsCallbacks;

    class ThemeSettings extends Settings
    {
        // Social media sites
        private $socialSites = array('facebook', 'instagram', 'twitter', 'google_plus', 'linkedin', 'github');

        /**
         * Custom Fields Callbacks
         *
         * Variable that holds all callback for the custom fields
         *
         * @var [type]
         */
        private $customFieldsCallbacks;

        /**
         * Contrusct class to activate actions and hooks as soon as the class is initialized
         */
        public function __construct()
        {
            $this->customFieldsCallbacks = new CustomFieldsCallbacks();

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
                'bitly_api_key'             => __('Bitly API key'),
                'github_client_id'          => __('Github client ID'),
                'github_client_secret'      => __('Github client secret'),
                'facebook_access_token'     => __('Facebook access token'),
                'instagram_access_token'    => __('Instagram access token'),
                'instagram_user_id'         => __('Instagram usesr ID'),
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

            // Parent call
            parent::addFields($fields);
        }
    }

?>
