<?php

    // Add custom fields
    add_action('admin_init', function() {

        // Footer center text
        register_setting('reading', 'footer_center_text');
        add_settings_field('footer_center_text', __('<label for="footer_center_text">Footer center text</label>'), 'displayFooterCenterText', 'reading', 'default');


        // Social media links
        add_settings_section('social_media_links', 'Social media links', '', 'general');

        // Facebook URL
        register_setting('general', 'facebook_link');
        add_settings_field('facebook_link', __('<label for="facebook_link">Facebook URL</label>'), 'displayFacebookLink', 'general', 'social_media_links');

        // Instagram URL
        register_setting('general', 'instagram_link');
        add_settings_field('instagram_link', __('<label for="instagram_link">Instagram URL</label>'), 'displayInstagramLink', 'general', 'social_media_links');

        // Twitter URL
        register_setting('general', 'twitter_link');
        add_settings_field('twitter_link', __('<label for="twitter_link">Twitter URL</label>'), 'displayTwitterLink', 'general', 'social_media_links');

        // Google Plus URL
        register_setting('general', 'google_plus_link');
        add_settings_field('google_plus_link', __('<label for="google_plus_link">Google+ URL</label>'), 'displayGooglePlusLink', 'general', 'social_media_links');

        // Linkedin URL
        register_setting('general', 'linkedin_link');
        add_settings_field('linkedin_link', __('<label for="linkedin_link">Linkedin URL</label>'), 'displayLinkedinLink', 'general', 'social_media_links');

        // Github URL
        register_setting('general', 'github_link');
        add_settings_field('github_link', __('<label for="github_link">Github URL</label>'), 'displayGithubLink', 'general', 'social_media_links');


        // API KEYs section
        add_settings_section('api_keys', 'API KEYs', '', 'general');


        // Bitly API key
        register_setting('general', 'bitly_api_key');
        add_settings_field('bitly_api_key', __('<label for="bitly_api_key">Bitly API key</label>'), 'displayBitlyAPIKey', 'general', 'api_keys');

        // Github client ID
        register_setting('general', 'github_client_id');
        add_settings_field('github_client_id', __('<label for="github_client_id">Github Client ID</label>'), 'displayGithubClientId', 'general', 'api_keys');

        // Github client Secret
        register_setting('general', 'github_client_secret');
        add_settings_field('github_client_secret', __('<label for="github_client_secret">Github Client Secret</label>'), 'displayGithubClientSecret', 'general', 'api_keys');

        // Facebook API
        register_setting('general', 'facebook_access_token');
        add_settings_field('facebook_access_token', __('<label for="facebook_access_token">Facebook Access Token</label>'), 'displayFacebookAccessToken', 'general', 'api_keys');

        // Instagram API
        register_setting('general', 'instagram_access_token');
        add_settings_field('instagram_access_token', __('<label for="instagram_access_token">Instagram Access Token</label>'), 'displayInstagramAccessToken', 'general', 'api_keys');
        register_setting('general', 'instagram_user_id');
        add_settings_field('instagram_user_id', __('<label for="instagram_user_id">Instagram User ID</label>'), 'displayInstagramUserId', 'general', 'api_keys');

        // Twitter API
        register_setting('general', 'twitter_oauth_access_token');
        add_settings_field('twitter_oauth_access_token', __('<label for="twitter_oauth_access_token">Twitter Access Token</label>'), 'displayTwitterAccessToken', 'general', 'api_keys');
        register_setting('general', 'twitter_oauth_access_token_secret');
        add_settings_field('twitter_oauth_access_token_secret', __('<label for="twitter_oauth_access_token_secret">Twitter Access Token Secret</label>'), 'displayTwitterAccessTokenSecret', 'general', 'api_keys');
        register_setting('general', 'twitter_customer_key');
        add_settings_field('twitter_customer_key', __('<label for="twitter_customer_key">Twitter Customer Key</label>'), 'displayTwitterCustomerKey', 'general', 'api_keys');
        register_setting('general', 'twitter_customer_secret');
        add_settings_field('twitter_customer_secret', __('<label for="twitter_customer_secret">Twitter Customer Secret</label>'), 'displayTwitterCustomerSecret', 'general', 'api_keys');
    });

    // Footer center text callback
    function displayFooterCenterText()
    {
        wp_editor(get_option('footer_center_text') ? get_option('footer_center_text') : '', 'footer_center_text');
    }

    // Facebook URL
    function displayFacebookLink()
    {
        ?>
        <input class="regular-text" type="text" name="facebook_link" id="facebook_link" value="<?= get_option('facebook_link') ? get_option('facebook_link') : '' ?>" />
        <?php
    }

    // Instagram URL
    function displayInstagramLink()
    {
        ?>
        <input class="regular-text" type="text" name="instagram_link" id="instagram_link" value="<?= get_option('instagram_link') ? get_option('instagram_link') : '' ?>" />
        <?php
    }

    // Twitter URL
    function displayTwitterLink()
    {
        ?>
        <input class="regular-text" type="text" name="twitter_link" id="twitter_link" value="<?= get_option('twitter_link') ? get_option('twitter_link') : '' ?>" />
        <?php
    }

    // Google+ URL
    function displayGooglePlusLink()
    {
        ?>
        <input class="regular-text" type="text" name="google_plus_link" id="google_plus_link" value="<?= get_option('google_plus_link') ? get_option('google_plus_link') : '' ?>" />
        <?php
    }

    // Linkedin URL
    function displayLinkedinLink()
    {
        ?>
        <input class="regular-text" type="text" name="linkedin_link" id="linkedin_link" value="<?= get_option('linkedin_link') ? get_option('linkedin_link') : '' ?>" />
        <?php
    }

    // Github URL
    function displayGithubLink()
    {
        ?>
        <input class="regular-text" type="text" name="github_link" id="github_link" value="<?= get_option('github_link') ? get_option('github_link') : '' ?>" />
        <?php
    }

    // Bitly API Key callback
    function displayBitlyAPIKey()
    {
        ?>
        <input class="regular-text" type="password" name="bitly_api_key" id="bitly_api_key" value="<?= get_option('bitly_api_key') ? get_option('bitly_api_key') : '' ?>" />
        <?php
    }

    // Github Client ID
    function displayGithubClientId()
    {
        ?>
        <input class="regular-text" type="password" name="github_client_id" id="github_client_id" value="<?= get_option('github_client_id') ? get_option('github_client_id') : '' ?>" />
        <?php
    }

    // Github Client Secret
    function displayGithubClientSecret()
    {
        ?>
        <input class="regular-text" type="password" name="github_client_secret" id="github_client_secret" value="<?= get_option('github_client_secret') ? get_option('github_client_secret') : '' ?>" />
        <?php
    }

    // Facebook Access Token
    function displayFacebookAccessToken()
    {
        ?>
        <input class="regular-text" type="password" name="facebook_access_token" id="facebook_access_token" value="<?= get_option('facebook_access_token') ? get_option('facebook_access_token') : '' ?>" />
        <?php
    }

    // Instagram Access Token
    function displayInstagramAccessToken()
    {
        ?>
        <input class="regular-text" type="password" name="instagram_access_token" id="instagram_access_token" value="<?= get_option('instagram_access_token') ? get_option('instagram_access_token') : '' ?>" />
        <?php
    }

    // Instagram Access Token
    function displayInstagramUserId()
    {
        ?>
        <input class="regular-text" type="text" name="instagram_user_id" id="instagram_user_id" value="<?= get_option('instagram_user_id') ? get_option('instagram_user_id') : '' ?>" />
        <?php
    }

    // Twitter Access Token
    function displayTwitterAccessToken()
    {
        ?>
        <input class="regular-text" type="password" name="twitter_oauth_access_token" id="twitter_oauth_access_token" value="<?= get_option('twitter_oauth_access_token') ? get_option('twitter_oauth_access_token') : '' ?>" />
        <?php
    }

    // Twitter Access Token Secret
    function displayTwitterAccessTokenSecret()
    {
        ?>
        <input class="regular-text" type="password" name="twitter_oauth_access_token_secret" id="twitter_oauth_access_token_secret" value="<?= get_option('twitter_oauth_access_token_secret') ? get_option('twitter_oauth_access_token_secret') : '' ?>" />
        <?php
    }

    // Twitter Access Token Secret
    function displayTwitterCustomerKey()
    {
        ?>
        <input class="regular-text" type="password" name="twitter_customer_key" id="twitter_customer_key" value="<?= get_option('twitter_customer_key') ? get_option('twitter_customer_key') : '' ?>" />
        <?php
    }

    // Twitter Access Token Secret
    function displayTwitterCustomerSecret()
    {
        ?>
        <input class="regular-text" type="password" name="twitter_customer_secret" id="twitter_customer_secret" value="<?= get_option('twitter_customer_secret') ? get_option('twitter_customer_secret') : '' ?>" />
        <?php
    }

?>
