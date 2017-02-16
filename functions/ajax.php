<?php

    // Process contact form submission
    function processContactForm()
    {
        // create ajax response
        $ajaxResponse = array();

        // check if name is present
        $ajaxResponse['name'] = $_POST['name'] != '' ? esc_attr($_POST['name']) : null;

        // check if email present
        $ajaxResponse['email'] = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? esc_attr($_POST['email']) : null;

        // get email subject
        $ajaxResponse['subject'] = $_POST['subject'] != '' ? esc_attr($_POST['subject']) : null;

        // check if message present
        $ajaxResponse['message'] = $_POST['message'] != '' ? esc_attr($_POST['message']) : null;

        // send email
        if ($ajaxResponse['name'] && $ajaxResponse['email'] && $ajaxResponse['subject'] && $ajaxResponse['message']):

                // get admin emails
                $admins = get_users(array('role' => 'administrator', 'fields' => array('user_email')));

                // create email
                $to = $admins[0]->user_email;
                $subject = esc_attr($ajaxResponse['subject']);
                $message = esc_attr($ajaxResponse['message']);
                $headers   = array();
                $headers[] = "MIME-Version: 1.0";
                $headers[] = "Content-type: text/html; charset=utf-8";
                $headers[] = "From: {$ajaxResponse['name']} <{$ajaxResponse['email']}>";
                $headers[] = "Reply-To: {$ajaxResponse['name']} <{$ajaxResponse['email']}>";
                $headers[] = "Subject: {$subject}";
                $headers[] = "X-Mailer: PHP/".phpversion();

                $emailResponse = wp_mail($to, $subject, $message, $headers);
                //$emailResponse = mail($to, $subject, $message, implode("\r\n", $headers));
                if ($emailResponse):
                        $ajaxResponse['emailSent'] = true;
                    else:
                        $ajaxResponse['emailSent'] = false;
                        $ajaxResponse['failReason'] = $emailResponse;
                endif;
            else:
                $ajaxResponse['emailSent'] = false;
                $ajaxResponse['failReason'] = "All fields are required. Try again.";
        endif;

        // terminate and send ajax response
        die(json_encode($ajaxResponse));
    }
    add_action('wp_ajax_submit-form', 'processContactForm');
    add_action('wp_ajax_nopriv_submit-form', 'processContactForm');

?>
