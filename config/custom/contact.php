<?php

    /**
     * ACF Loader class
     *
     * @package ccwp
     */

    namespace ccwp\custom;

    class Contact
    {
        /**
         * Contact form action
         */
        const CONTACT_ACTION = 'contact-email';

        /**
         * Construct class to activate actions and hooks as soon as the class is initialized
         */
        public function __construct($hide = false)
        {
            add_action('wp_ajax_'.self::CONTACT_ACTION, array($this, 'sendMessageAJAX'));
            add_action('wp_ajax_nopriv_'.self::CONTACT_ACTION, array($this, 'sendMessageAJAX'));
        }

        /**
         * Set email header
         */
        public static function setHeaders($name, $email, $subject)
        {
            $headers   = array();

            $headers[] = "MIME-Version: 1.0";
            $headers[] = "Content-type: text/html; charset=utf-8";
            $headers[] = "From: {$name} <{$email}>";
            $headers[] = "Reply-To: {$name} <{$email}>";
            $headers[] = "Subject: {$subject}";
            $headers[] = "X-Mailer: PHP/".phpversion();

            return $headers;
        }

        public static function sendMessagePHP($input)
        {
            $emailResponse = '';
            $failReason = '';

            if (isset($input['submit'])):

                // Get validated contact data
                list($name, $email, $subject, $message) = self::validateContactForm($input);

                if ($name && $email && $subject && $message):

                        // Set recipient
                        $to = self::getEmailAddresses();

                        // Set headers
                        $headers = self::setHeaders($name, $email, $subject);

                        // Send email
                        $emailResponse = wp_mail($to, $subject, $message, $headers);
                        if (!$emailResponse):
                            $failReason = "Email error. Try again or use the address above";
                        endif;
                    else:
                        $failReason = "All fields are required. Try again";
                endif;
            endif;

            return array($emailResponse, $failReason);
        }

        /**
         * Send emaik via AJAX request
         */
        public function sendMessageAJAX()
        {
            // create ajax response
            $ajaxResponse = self::validateContactForm($_POST);

            // Set recipient
            $to = self::getEmailAddresses();

            // Set headers
            $headers = self::setHeaders($ajaxResponse['name'], $ajaxResponse['email'], $ajaxResponse['subject']);

            $emailResponse = wp_mail($to, $ajaxResponse['subject'], $ajaxResponse['message'], $headers);

            if ($emailResponse):
                    $ajaxResponse['emailSent'] = true;
                else:
                    $ajaxResponse['emailSent'] = false;
                    $ajaxResponse['failReason'] = $emailResponse;
            endif;

            // terminate and send ajax response
            die(json_encode($ajaxResponse));
        }

        /**
         * Get email addresses
         *
         * @return String Admin email address
         */
        private function getEmailAddresses()
        {
            // Get admins email
            $admins = get_users(array('role' => 'administrator', 'fields' => array('user_email')));

            // Return email address
            return $admins[0]->user_email;
        }

        /**
         * Validate contact form
         */
        public static function validateContactForm($input)
        {
            $name = isset($input['contact-name']) ? esc_attr($input['contact-name']) : false;
            $email = filter_var($input['contact-email'], FILTER_VALIDATE_EMAIL) ? esc_attr($input['contact-email']) : false;
            $subject = esc_attr($input['contact-subject']);
            $message = isset($input['contact-message']) ? esc_attr($input['contact-message']) : false;

            return array(
                'name'      => $name,
                'email'     => $email,
                'subject'   => $subject,
                'message'   =>$message
            );
        }
    }

?>
