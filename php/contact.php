<?php
	if (isset($_POST['submit'])) print_r($_POST);
	/*if (isset($_POST['submit'])):
		$to = 'corneliucirlan@gmail.com';
		$subject = 'Test';
		$message = mysql_real_escape_string($_POST('message'));
		$headers   = array();
		$headers[] = "MIME-Version: 1.0";
		$headers[] = "Content-type: text/html; charset=utf-8";
		$headers[] = "From: {$_POST['name']} <{$_POST['email']}>";
		$headers[] = "Reply-To: {$_POST['name']} <{$_POST['email']}>";
		$headers[] = "Subject: {$subject}";
		$headers[] = "X-Mailer: PHP/".phpversion();

		mail($to, $subject, $email, implode("\r\n", $headers));
	endif;*/
?>

<div class="col-md-4 col-md-offset-4">
	<p>You can contact us using <a href="mailto:corneliucirlan@gmail" target="_blank">corneliucirlan@gmail.com</a> or the form below.</p>
	<form id="contact" role="form" action="" method="post">
		<div class="form-group">
			<input type="text" class="form-control" name="name" id="name" placeholder="Nane">
		</div>
		<div class="form-group">
			<input type="email" class="form-control" name="email" id="email" placeholder="Email">
		</div>
		<div class="form-group">
			<textarea class="form-control" rows="4" name="message" id="message" placeholder="Message"></textarea>
		</div>
		<button id="submit-form" type="submit" class="btn btn-primary" style="width: 100%;" name="submit">Submit</button>
	</form>
</div>