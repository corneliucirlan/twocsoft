<?php

	// Load breadcurmbs
	include_once(THEME_DIR.'libs/breadcrumbs.php');

	// Load ACF fields
	include_once(THEME_DIR.'functions/acf/about.php');
	include_once(THEME_DIR.'functions/acf/frontpage.php');
	include_once(THEME_DIR.'functions/acf/portfolio.php');
	include_once(THEME_DIR.'functions/acf/services.php');

	// Load SKILL class
	include_once(THEME_DIR.'libs/skill.class.php');

	// Load CERTS class
	include_once(THEME_DIR.'libs/certs.class.php');

	// Load Mobile Detect class
	include_once(THEME_DIR.'libs/Mobile_Detect.php');

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

	// Change Yoast SEO priority to low
	add_filter('wpseo_metabox_prio', function() { return 'low';});

	// Remove images media links
	add_action('admin_init', function() {
    	$image_set = get_option( 'image_default_link_type' );
    	if ($image_set !== 'none')
        	update_option('image_default_link_type', 'none');
	}, 10);

	// Add custom fields
	add_action('admin_init', function() {

		// Footer center text
		register_setting('reading', 'footer_center_text');
		add_settings_field('footer_center_text', __('<label for="footer_center_text">Footer center text</label>'), 'displayFooterCenterText', 'reading', 'default');

		// Bitly API key
		register_setting('general', 'bitly_api_key');
		add_settings_field('bitly_api_key', __('<label for="bitly_api_key">Bitly API key</label>'), 'displayBitlyAPIKey', 'general', 'default');

	});

	// Footer center text callback
	function displayFooterCenterText()
	{
		wp_editor(get_option('footer_center_text') ? get_option('footer_center_text') : '', 'footer_center_text');
	}

	// Bitly API Key callback
	function displayBitlyAPIKey()
	{
		?>
		<input class="regular-text" type="text" name="bitly_api_key" value="<?php echo get_option('bitly_api_key') ? get_option('bitly_api_key') : '' ?>" placeholder="" />
		<?php
	}

?>
