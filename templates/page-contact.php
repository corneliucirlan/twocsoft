<?php

    // Security check
    if (!defined('ABSPATH')) die;

?>

<?php

	if (isset($_POST['submit'])):
		$name = isset($_POST['name']) ? esc_attr($_POST['name']) : false;
		$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? esc_attr($_POST['email']) : false;
		$subject = esc_attr($_POST['subject']);
		$message = isset($_POST['message']) ? esc_attr($_POST['message']) : false;
		
		if ($name && $email && $subject && $message):

				// get admin emails
				$admins = get_users(array('role' => 'administrator', 'fields' => array('user_email')));

				// create email
				$to = $admins[0]->user_email;
				$headers   = array();
				$headers[] = "MIME-Version: 1.0";
				$headers[] = "Content-type: text/html; charset=utf-8";
				$headers[] = "From: {$name} <{$email}>";
				$headers[] = "Reply-To: {$name} <{$email}>";
				$headers[] = "Subject: {$subject}";
				$headers[] = "X-Mailer: PHP/".phpversion();

				// send email
				//$emailResponse = mail($to, $subject, $email, implode("\r\n", $headers));
				$emailResponse = wp_mail($to, $subject, $message, $headers);
				if (!$emailResponse):
					$failReason = "Email error. Try again or use the address above";
				endif;
			else:
				$failReason = "All fields are required. Try again";
		endif;
	endif;

?>

<main class="row">
	<div class="col m6 offset-m3">
		<div class="card">
			<div class="card-content">
				<h2 class="card-title">Let's work together</h2>
				<p>For any business inquiries email me using <a href="mailto:corneliu@corneliucirlan.com" target="_blank">corneliu@corneliucirlan.com</a> or the form below.</p>
				<form id="contact-form" role="form" action="" method="post">
					<input type="hidden" name="action" id="action" value="submit-form" />

					<!-- FULL NAME -->
					<div class="input-field col s12">
						<input type="text" class="validate" name="name" id="name" required <?php if (isset($_POST['name'])) echo $_POST['name'] ? ' value="'.$_POST['name'].'"' : '' ?>>
						<label for="name">Full name</label>
					</div>

					<!-- EMAIL ADDRESS -->
					<div class="input-field col s12">
						<input type="email" class="validate" name="email" id="email" required <?php if (isset($_POST['email'])) echo $_POST['email'] ? ' value="'.$_POST['email'].'"' : '' ?>>
						<label for="email">E-mail address</label>
					</div>
	 
	 				<!-- MESSAGE SUBJECT -->
	 				<div class="input-field col s12">
						<input type="text" class="validate" name="subject" id="subject" required <?php if (isset($_POST['subject'])) echo $_POST['subject'] ? ' value="'.$_POST['subject'].'"' : '' ?>>
						<label for="subject">Subject</label>
					</div>

					<!-- MESSAGE BODY -->
					<div class="input-field col s12">
						<textarea class="materialize-textarea validate" rows="4" name="message" id="message" required><?php if (isset($_POST['message'])) echo $_POST['message'] ? $_POST['message'] : '' ?></textarea>
						<label for="message">Message</label>
					</div>
					<button id="submit-form" type="submit" class="waves-effect waves-blue btn-flat" style="width: 100%;" name="submit"><?php if ($_POST) echo $emailResponse ? "Message sent" : $failReason; else echo "Send message"; ?></button>
					<div id="form-progress" class="progress" style="display: none;">
				    	<div class="indeterminate"></div>
				  	</div>
				</form>
			</div>
		</div>
	</div>
</main>