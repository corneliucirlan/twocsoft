<?php

	add_action('wp_ajax_submit-form', 'tcsContactForm');
	add_action('wp_ajax_nopriv_submit-form', 'tcsContactForm');

	function tcsContactForm()
	{
		// create ajax response
		$ajaxResponse = array();

		// check if name is present
		$ajaxResponse['full-name'] = $_POST['full-name'] != '' ? esc_attr($_POST['full-name']) : null;

		// check if email present
		$ajaxResponse['email'] = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? esc_attr($_POST['email']) : null;

		// check if message present
		$ajaxResponse['message'] = $_POST['message'] != '' ? esc_attr($_POST['message']) : null;

		// send email
		if ($ajaxResponse['name'] && $ajaxResponse['email'] && $ajaxResponse['message']):
				$to = 'cornel@twocsoft.com';
				$subject = 'New Business Proposal';
				$headers   = array();
				$headers[] = "MIME-Version: 1.0";
				$headers[] = "Content-type: text/html; charset=utf-8";
				$headers[] = "From: {$ajaxResponse['name']} <{$ajaxResponse['email']}>";
				$headers[] = "Reply-To: {$ajaxResponse['name']} <{$ajaxResponse['email']}>";
				$headers[] = "Subject: {$subject}";
				$headers[] = "X-Mailer: PHP/".phpversion();

				$emailResponse = mail($to, $subject, $email, implode("\r\n", $headers));
				if ($emailResponse):
						$ajaxResponse['emailSent'] = true;
					else:
						$ajaxResponse['emailSent'] = false;
						$ajaxResponse['failReason'] = "Server error.";
				endif;
			else:
				$ajaxResponse['emailSent'] = false;
				$ajaxResponse['failReason'] = "All fields are required. Try again.";
		endif;

		// send ajax response
		echo json_encode($ajaxResponse);

		// terminate
		exit();
	}

?>