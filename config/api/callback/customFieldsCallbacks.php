<?php

    /**
     * Callbacks for Settings class
     *
     * @package ccwp
     */

    namespace ccwp\api\callback;

    class CustomFieldsCallbacks
    {
        // Footer center text callback
        function displayFooterCenterText()
        {
            wp_editor(get_option('footer_center_text') ? get_option('footer_center_text') : '', 'footer_center_text');
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
