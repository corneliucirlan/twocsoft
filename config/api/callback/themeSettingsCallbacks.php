<?php

    /**
     * Callbacks for Social Media Settings class
     *
     * @package cornelius
     */

    namespace cornelius\api\callback;

    // Load dependencies
    use cornelius\custom\themeSettings;

    // Define class
    class ThemeSettingsCallbacks
    {
        /**
         * Social media sites parameters
         */
        const SOCIAL_MEDIA_SITES = array(
            'facebook-f'      => array(
                'url'       => 'https://www.facebook.com/sharer/sharer.php',
                'urlParams' => array('u'),
            ),
            'twitter'       => array(
                'url'       => 'https://twitter.com/intent/tweet',
                'urlParams' => array('text', 'url'),
            ),
            'linkedin-in'      => array(
                'url'       => 'https://www.linkedin.com/shareArticle',
                'urlParams' => array('mini', 'url', 'title', 'summary'),
            ),
            'reddit-alien'        => array(
                'url'       => 'http://www.reddit.com/submit',
                'urlParams' => array('url', 'title'),
            ),
        );

        /**
         * Load page template
         */
        public function submenuSocialMediaPage()
        {
            return require_once get_template_directory().'/templates/admin/social-media.php';
        }

        /**
         * Load Contact Links page template
         */
        public function submenuContactLinksPage()
        {
            return require_once get_template_directory().'/templates/admin/contact-links.php';
        }

        /**
         * Social media profiles section
         */
        public function socialMediaProfiles()
        {
            _e('Enable your social media profiles', 'cornelius');
        }

        /**
         * Social media links section
         */
        public function socialMediaLinksSection()
        {
            _e('Add your social media profile links', 'cornelius');
        }

        /**
         * Social media API section
         */
        public function socialAPISection()
        {
            _e('Add access tokens for all social media sites', 'cornelius');
        }

        public function contactLinksSection()
        {
            _e('Add all ways you can be contacted.', 'corneliu');
        }

        /**
         * Social media share section
         */
        public function socialMediaShareSection()
        {
            _e('Enable social sites whare you want to share your content', 'cornelius');
        }

        /**
         * Render social media share sites
         *
         * @param array $args settings for social media share sites
         */
        public function renderSocialMediaShare($args)
        {
            $settings = get_option(ThemeSettings::SOCIAL_MEDIA_SHARE_NAME);
            foreach (self::SOCIAL_MEDIA_SITES as $profile => $value):
                $checked = is_array($settings) && in_array($profile, $settings);
                ?>
                <input type="checkbox" class="widget-checkhox" id="profile-<?php echo $profile ?>" name="<?php echo $args['label_for'] ?>[]" value="<?php echo $profile ?>" <?php checked($checked, 1) ?> />
                <i data-id="profile-<?php echo $profile ?>" class="fab fa-social fa-3x <?php echo $checked ? 'fa-active ' : '' ?>fa-<?php echo $profile ?>"></i>
                <?php
            endforeach;
        }

        /**
         * Display custom fields
         *
         * Generic function to render an input box
         */
        public function displayCustomFieldInput($args)
        {
            ?>
            <input class="regular-text" type="text" name="<?php echo $args['link'] ?>" id="<?php echo $args['link'] ?>" value="<?= get_option($args['link']) ? get_option($args['link']) : '' ?>" />
            <?php
        }
    }

?>
