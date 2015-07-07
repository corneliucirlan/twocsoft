<?php

	if (isset($_POST['submit'])):
		$name = isset($_POST['full-name']) ? esc_attr($_POST['full-name']) : false;
		$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? esc_attr($_POST['email']) : false;
		$message = isset($_POST['message']) ? esc_attr($_POST['message']) : false;
		
		if ($name && $email && $message):
				$to = 'cornel@twocsoft.com';
				$subject = 'New Business Proposal';
				$headers   = array();
				$headers[] = "MIME-Version: 1.0";
				$headers[] = "Content-type: text/html; charset=utf-8";
				$headers[] = "From: {$ajaxResponse['full-name']} <{$ajaxResponse['email']}>";
				$headers[] = "Reply-To: {$ajaxResponse['full-name']} <{$ajaxResponse['email']}>";
				$headers[] = "Subject: {$subject}";
				$headers[] = "X-Mailer: PHP/".phpversion();

				$emailResponse = mail($to, $subject, $email, implode("\r\n", $headers));
				if (!$emailResponse):
					$failReason = "Email error. Try again or use the address above";
				endif;
			else:
				$failReason = "All fields are required. Try again";
		endif;
	endif;

?>

<div class="col-md-4 col-md-offset-4">
	<p>You can contact us using <a href="mailto:cornel@twocsoft.com" target="_blank">cornel@twocsoft.com</a> or the form below.</p>
	<form id="contact" role="form" action="" method="post">
		<input type="hidden" name="action" id="action" value="submit-form" />
		<div class="form-group has-feedback<?php if ($_POST) echo $_POST['full-name'] ? ' has-success' : ' has-warning' ?>">
			<input type="text" class="form-control" name="full-name" id="full-name" placeholder="Nane"<?php echo $_POST['full-name'] ? ' value="'.$_POST['full-name'].'"' : '' ?>>
			<span class="glyphicon<?php if ($_POST) echo $_POST['full-name'] ? ' glyphicon-ok' : ' glyphicon-warning-sign' ?> form-control-feedback" aria-hidden="true"></span>
		</div>
		<div class="form-group has-feedback<?php if ($_POST) echo $_POST['email'] ? ' has-success' : ' has-warning' ?>">
			<input type="email" class="form-control" name="email" id="email" placeholder="Email"<?php echo $_POST['email'] ? ' value="'.$_POST['email'].'"' : '' ?>>
			<span class="glyphicon<?php if ($_POST) echo $_POST['email'] ? ' glyphicon-ok' : ' glyphicon-warning-sign' ?> form-control-feedback" aria-hidden="true"></span>
		</div>
		<div class="form-group has-feedback<?php if ($_POST) echo $_POST['message'] ? ' has-success' : ' has-warning' ?>">
			<textarea class="form-control" rows="4" name="message" id="message" placeholder="Message"><?php echo $_POST['message'] ? $_POST['message'] : '' ?></textarea>
			<span class="glyphicon<?php if ($_POST) echo $_POST['message'] ? ' glyphicon-ok' : ' glyphicon-warning-sign' ?> form-control-feedback" aria-hidden="true"></span>
		</div>
		<button id="submit-form" type="submit" class="btn btn-primary" style="width: 100%;" name="submit"><?php if ($_POST) echo $emailResponse ? "Message sent" : $failReason; else echo "Send message"; ?></button>
	</form>
</div>