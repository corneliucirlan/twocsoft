<?php

    // Security check
    if (!defined('ABSPATH')) die;

    the_post()

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

<div class="page-contact row">
	<div class="page-contact-social col-md-6">
        <h2>Let's work together</h2>
        <?php the_content() ?>
        <ul class="social-icons">
            <li><a title="Email" class="" target="_blank" href="mailto:<?= bloginfo('admin_email') ?>"><i class="fa fa-3x fa-envelope-o"></i></a></li>
			<li><a title="Facebook" class="" target="_blank" href="<?= get_option('facebook_link') ?>"><i class="fa fa-3x fa-facebook"></i></a></li>
			<li><a title="Twitter" class="" target="_blank" href="<?= get_option('twitter_link') ?>"><i class="fa fa-3x fa-twitter"></i></a></li>
			<li><a title="Google+" class="" target="_blank" href="<?= get_option('google_plus_link') ?>"><i class="fa fa-3x fa-google-plus"></i></a></li>
			<li><a title="Linkedin" class="" target="_blank" href="<?= get_option('linkedin_link') ?>"><i class="fa fa-3x fa-linkedin"></i></a></li>
			<li><a title="Github" class="" target="_blank" href="<?= get_option('github_link') ?>"><i class="fa fa-3x fa-github"></i></a></li>
		</ul>
	</div>

	<div class="page-contact-form card-wrapper col-md-5 offset-md-1">
        <div class="card card-block">
            <form id="contact-form" action="<?= basename(__FILE__) ?>" method="post">
                <input type="hidden" name="action" id="action" value="submit-form" />

                <!-- Full name -->
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" required <?php if (isset($_POST['name'])) echo $_POST['name'] ? ' value="'.$_POST['name'].'"' : '' ?> />
                    <label for="name">Full name</label>
                </div>

                <!-- Email address -->
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" required <?php if (isset($_POST['email'])) echo $_POST['email'] ? ' value="'.$_POST['email'].'"' : '' ?> />
                    <label for="email">Email</label>
                </div>

                <!-- Message subject -->
                <div class="form-group">
                    <input type="text" class="form-control" id="subject" name="subject" required <?php if (isset($_POST['subject'])) echo $_POST['subject'] ? ' value="'.$_POST['subject'].'"' : '' ?> />
                    <label for="subject">Subject</label>
                </div>

                <!-- Message body -->
                <div class="form-group">
                    <textarea class="form-control" rows="4" id="message" name="message" required><?php if (isset($_POST['message'])) echo $_POST['message'] ? $_POST['message'] : '' ?></textarea>
                    <label for="message">Message</label>
                </div>

                <button id="submit-form" type="submit" name="submit" class="btn btn-primary-outline"><?php if ($_POST) echo $emailResponse ? "Message sent" : $failReason; else echo "Send message"; ?></button>
            </form>
        </dvi>
	</div>
</div>
