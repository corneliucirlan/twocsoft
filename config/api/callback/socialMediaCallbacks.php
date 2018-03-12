<?php

    /**
     * Callbacks for Social Media Settings class
     *
     * @package ccwp
     */

    namespace ccwp\api\callback;

    // Load dependencies
    use ccwp\custom\themeSettings;

    // Define class
    class SocialMediaCallbacks
    {
        /**
         * Social media sites parameters
         */
        const SOCIAL_MEDIA_SITES = array(
            'facebook'      => array(
                'url'       => 'https://www.facebook.com/sharer/sharer.php',
                'urlParams' => array('u'),
            ),
            'twitter'       => array(
                'url'       => 'https://twitter.com/intent/tweet',
                'urlParams' => array('text', 'url'),
            ),
            'google-plus'   => array(
                'url'       => 'https://plus.google.com/share',
                'urlParams' => array('url'),
            ),
            'linkedin'      => array(
                'url'       => 'https://www.linkedin.com/shareArticle',
                'urlParams' => array('mini', 'url', 'title', 'summary'),
            ),
            'pinterest'     => array(
                'url'       => 'http://pinterest.com/pin/create/button/',
                'urlParams' => array('url', 'media', 'description'),
            ),
            'reddit'        => array(
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
         * Social media profiles section
         */
        public function socialMediaProfiles()
        {
            _e('Enable your social media profiles', 'ccwp');
        }

        /**
         * Social media share section
         */
        public function socialMediaShare()
        {
            _e('Enable social sites whare you want to share your content', 'ccwp');
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
                <i data-id="profile-<?php echo $profile ?>" class="fa fa-social fa-3x <?php echo $checked ? 'fa-active ' : '' ?>fa-<?php echo $profile ?>"></i>
                <?php
            endforeach;
        }

        /**
         * Validate Social Media Share settings
         *
         * @param  [type] $input raw input
         * @return [type]        sanitized input
         */
        public function validateSocialMediaShareSettings($input)
        {
            return apply_filters('sanitize_text_field', $_POST[ThemeSettings::SOCIAL_MEDIA_SHARE_NAME]);
        }
    }

?>
