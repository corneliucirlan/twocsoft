<?php

    /**
     * Template part for displaying Contact page
     *
     * @link https://codex.wordpress.org/Template_Hierarchy
     *
     * @package ccwp
     */

    // Security check
    if (!defined('ABSPATH')) die;

?>

<?php

    // Load dependency
    use ccwp\custom\Contact;

    list($emailResponse, $failReason) = ccwp\custom\Contact::sendMessagePHP($_POST);

?>

<main class="page-contact row">
	<div class="page-contact-social col-xs-12 col-md-8 offset-md-2">
        <h2>Let's work together</h2>
        <?php the_content() ?>

        <ul class="social-icons social-icons-contact">
            <li class="social-icon"><a title="Email" class="" target="_blank" href="mailto:<?php echo bloginfo('admin_email') ?>"><i class="fa fa-3x fa-envelope-o"></i></a></li>
			<li class="social-icon"><a title="Facebook" class="" target="_blank" href="<?php echo get_option('facebook_link') ?>"><i class="fa fa-3x fa-facebook"></i></a></li>
			<li class="social-icon"><a title="Instagram" class="" target="_blank" href="<?php echo get_option('instagram_link') ?>"><i class="fa fa-3x fa-instagram"></i></a></li>
			<li class="social-icon"><a title="Twitter" class="" target="_blank" href="<?php echo get_option('twitter_link') ?>"><i class="fa fa-3x fa-twitter"></i></a></li>
			<li class="social-icon"><a title="Google+" class="" target="_blank" href="<?php echo get_option('google_plus_link') ?>"><i class="fa fa-3x fa-google-plus"></i></a></li>
			<li class="social-icon"><a title="Linkedin" class="" target="_blank" href="<?php echo get_option('linkedin_link') ?>"><i class="fa fa-3x fa-linkedin"></i></a></li>
			<li class="social-icon"><a title="Github" class="" target="_blank" href="<?php echo get_option('github_link') ?>"><i class="fa fa-3x fa-github"></i></a></li>
		</ul>

        <!-- Contact form -->
        <div class="card card-body card-contact">
            <form id="contact-form" action="" method="post">
                <input type="hidden" name="action" id="action" value="<?php echo ccwp\custom\Contact::CONTACT_ACTION ?>" />
                <input type="hidden" name="_wpnonce" id="_wpnonce" value="<?php echo wp_create_nonce(ccwp\custom\Contact::CONTACT_ACTION) ?>">

                <!-- Full name -->
                <div class="form-group">
                    <input type="text" class="form-control" id="contact-name" name="contact-name" required <?php if (isset($_POST['contact-name'])) echo $_POST['contact-name'] ? ' value="'.$_POST['contact-name'].'"' : '' ?> />
                    <label for="contact-name">Full name</label>
                </div>

                <!-- Email address -->
                <div class="form-group">
                    <input type="email" class="form-control" id="contact-email" name="contact-email" required <?php if (isset($_POST['contact-email'])) echo $_POST['contact-email'] ? ' value="'.$_POST['contact-email'].'"' : '' ?> />
                    <label for="contact-email">Email</label>
                </div>

                <!-- Message subject -->
                <div class="form-group">
                    <input type="text" class="form-control" id="contact-subject" name="contact-subject" required <?php if (isset($_POST['contact-subject'])) echo $_POST['contact-subject'] ? ' value="'.$_POST['contact-subject'].'"' : '' ?> />
                    <label for="contact-subject">Subject</label>
                </div>

                <!-- Message body -->
                <div class="form-group">
                    <textarea class="form-control" rows="4" id="contact-message" name="contact-message" required><?php if (isset($_POST['contact-message'])) echo $_POST['contact-message'] ? $_POST['contact-message'] : '' ?></textarea>
                    <label for="contact-message">Message</label>
                </div>

                <button id="submit-form" type="submit" name="submit" class="btn btn-primary"><?php if ($_POST) echo $emailResponse ? "Message sent" : $failReason; else echo "Send message"; ?></button>
            </form>
        </div>
	</div>
</main>
