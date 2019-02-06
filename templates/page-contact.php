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

    the_post();
?>

<main class="page-portfolio cards row">

    <div class="col-12 col-md-5 offset-md-1">
        <ul class="contact-links">
            <li class="contact-link"><i class="far fa-envelope"></i><a class="link" target="_blank" href="mailto:corneliu@corneliucirlan.com">corneliu@corneliucirlan.com</a></li>
            <li class="contact-link"><i class="fab fa-skype"></i><a class="link" target="_blank" href="skype:corneliucirlan?chat">corneliucirlan</a></li>
            <li class="contact-link"><i class="fab fa-facebook-f"></i><a class="link" target="_blank" href="https://www.facebook.com/corneliucirlan">facebook.com/corneliucirlan</a></li>
            <li class="contact-link"><i class="fab fa-twitter"></i><a class="link" target="_blank" href="https://www.twitter.com/corneliucirlan">twitter.com/corneliucirlan</a></li>
            <li class="contact-link"><i class="fab fa-linkedin-in"></i><a class="link" target="_blank" href="https://www.linkedin.com/in/corneliucirlan">linkedin.com/in/corneliucirlan</a></li>
        </ul>
    </div>

    <div class="col-12 col-md-5">
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

            <div class="button-container">
                <button id="submit-form" type="submit" name="submit" class="btn btn-primary"><?php if ($_POST) echo $emailResponse ? "Message sent" : $failReason; else echo "Send message"; ?></button>
            </div>
        </form>
    </div>

</main>
