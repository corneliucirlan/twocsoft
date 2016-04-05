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

<main class="col-md-6 col-md-offset-3">
	<div class="md-card md-shadow-2dp">
		<div class="md-card-header">
			<h2>Let's work together</h2>
		</div>
		<div class="md-card-body">
			<p>For any business inquiries email me using <a href="mailto:corneliu@corneliucirlan.com" target="_blank">corneliu@corneliucirlan.com</a> or the form below.</p>
			<form id="contact" role="form" action="" method="post">
				<input type="hidden" name="action" id="action" value="submit-form" />
				
				<!-- FULL NAME -->
				<div class="form-group has-feedback<?php if ($_POST) echo $_POST['name'] ? ' has-success' : ' has-warning' ?>">
					<input type="text" class="form-control" name="name" id="name" placeholder="Nane"<?php if (isset($_POST['name'])) echo $_POST['name'] ? ' value="'.$_POST['name'].'"' : '' ?>>
					<span class="glyphicon<?php if ($_POST) echo $_POST['name'] ? ' glyphicon-ok' : ' glyphicon-warning-sign' ?> form-control-feedback" aria-hidden="true"></span>
				</div>

				<!-- EMAIL ADDRESS -->
				<div class="form-group has-feedback<?php if ($_POST) echo $_POST['email'] ? ' has-success' : ' has-warning' ?>">
					<input type="email" class="form-control" name="email" id="email" placeholder="Email"<?php if (isset($_POST['email'])) echo $_POST['email'] ? ' value="'.$_POST['email'].'"' : '' ?>>
					<span class="glyphicon<?php if ($_POST) echo $_POST['email'] ? ' glyphicon-ok' : ' glyphicon-warning-sign' ?> form-control-feedback" aria-hidden="true"></span>
				</div>
 
 				<!-- MESSAGE SUBJECT -->
 				<div class="form-group has-feedback<?php if ($_POST) echo $_POST['subject'] ? ' has-success' : ' has-warning' ?>">
					<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"<?php if (isset($_POST['subject'])) echo $_POST['subject'] ? ' value="'.$_POST['subject'].'"' : '' ?>>
					<span class="glyphicon<?php if ($_POST) echo $_POST['subject'] ? ' glyphicon-ok' : ' glyphicon-warning-sign' ?> form-control-feedback" aria-hidden="true"></span>
				</div>

				<!-- MESSAGE BODY -->
				<div class="form-group has-feedback<?php if ($_POST) echo $_POST['message'] ? ' has-success' : ' has-warning' ?>">
					<textarea class="form-control" rows="4" name="message" id="message" placeholder="Message"><?php if (isset($_POST['message'])) echo $_POST['message'] ? $_POST['message'] : '' ?></textarea>
					<span class="glyphicon<?php if ($_POST) echo $_POST['message'] ? ' glyphicon-ok' : ' glyphicon-warning-sign' ?> form-control-feedback" aria-hidden="true"></span>
				</div>
				<button id="submit-form" type="submit" class="btn btn-primary" style="width: 100%;" name="submit"><?php if ($_POST) echo $emailResponse ? "Message sent" : $failReason; else echo "Send message"; ?></button>
			</form>
		</div>
	</div>
</main>