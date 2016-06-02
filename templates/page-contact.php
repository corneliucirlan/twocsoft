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
	<div class="col m6">
		 <h2 class="card-title">Let's work together</h2>
		 <?php the_content() ?>
		 <ul class="contact-social">
			<li><a title="Email" class="mail" target="_blank" href="mailto:corneliu@corneliucirlan.com"><i class="fa fa-3x fa-envelope-o"></i></a></li>
			<li><a title="Facebook" class="facebook" target="_blank" href="https://www.facebook.com/corneliucirlan"><i class="fa fa-3x fa-facebook"></i></a></li>
			<li><a title="Twitter" class="twitter" target="_blank" href="https://twitter.com/corneliucirlan"><i class="fa fa-3x fa-twitter"></i></a></li>
			<li><a title="Google+" class="google-plus" target="_blank" href="https://plus.google.com/+CorneliuCirlan"><i class="fa fa-3x fa-google-plus"></i></a></li>
			<li><a title="Linkedin" class="linkedin" target="_blank" href="https://www.linkedin.com/in/corneliucirlan"><i class="fa fa-3x fa-linkedin"></i></a></li>
			<li><a title="Github" class="github" target="_blank" href="https://www.github.com/corneliucirlan"><i class="fa fa-3x fa-github"></i></a></li>
		</ul>
	</div>
	
	<div class="col m5 offset-m1">
		<form id="contact-form" action="<?php echo basename(__FILE__) ?>" method="post">
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
			<button id="submit-form" type="submit" class="waves-effect waves-light btn blue darken-2" style="width: 100%;" name="submit"><?php if ($_POST) echo $emailResponse ? "Message sent" : $failReason; else echo "Send message"; ?></button>
			<div id="form-progress" class="progress" style="display: none;">
		    	<div class="indeterminate"></div>
		  	</div>
		</form>
	</div>
</main>