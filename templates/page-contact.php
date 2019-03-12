<?php

    /**
     * Template part for displaying Contact page
     *
     * @link https://codex.wordpress.org/Template_Hierarchy
     *
     * @package cornelius
     */

    // Security check
    if (!defined('ABSPATH')) die;

    the_post();
?>

<main class="page-portfolio cards row">


    <div class="col-12 col-md-5 offset-md-1">
        <?php the_content() ?>
        <ul class="contact-links">

            <h5 class="contact-title">LOCATION</h5>
            <li class="contact-link"><i class="far fa-map"></i><a class="link">Vaslui, Romania</a></li>

            <h5 class="contact-title">E-MAIL</h5>
            <li class="contact-link"><i class="far fa-envelope"></i><a class="link" target="_blank" href="mailto:corneliu@corneliucirlan.com">corneliu@corneliucirlan.com</a></li>

            <h5 class="contact-title">CHAT / VIDEO</h5>
            <li class="contact-link"><i class="fab fa-skype"></i><a class="link" target="_blank" href="skype:corneliucirlan?chat">corneliucirlan</a></li>

            <h5 class="contact-title">NEED TO MAKE A PAYMENT?</h5>
            <p class="paypal-instructions text-muted">Please submit your deposit or pay an invoice via PayPal following the link below. Thank you.</p>
            <a target="_blank" href="https://www.paypal.me/corneliucirlan" class="btn btn-primary btn-paypal"><i class="fab fa-paypal"></i>Submit payment</a>
        </ul>
    </div>

    <div class="col-12 col-md-5">
        <h5 class="contact-title">CONTACT FORM</h5>
        <form id="contact-form" action="" method="post">
            <input type="hidden" name="action" id="action" value="<?php echo cornelius\custom\Contact::CONTACT_ACTION ?>" />
            <input type="hidden" name="_wpnonce" id="_wpnonce" value="<?php echo wp_create_nonce(cornelius\custom\Contact::CONTACT_ACTION) ?>">

            <!-- Full name -->
            <div class="form-group">
                <input type="text" class="form-control" id="contact-name" name="contact-name" required <?php if (isset($_POST['contact-name'])) echo $_POST['contact-name'] ? ' value="'.$_POST['contact-name'].'"' : '' ?> />
                <label for="contact-name">Full name</label>
            </div>

            <!-- Email address -->
            <div class="form-group">
                <input type="email" class="form-control" id="contact-email" name="contact-email" required <?php if (isset($_POST['contact-email'])) echo $_POST['contact-email'] ? ' value="'.$_POST['contact-email'].'"' : '' ?> />
                <label for="contact-email">E-mail</label>
            </div>

            <!-- Message subject -->
            <div class="form-group">
                <input type="text" class="form-control" id="contact-subject" name="contact-subject" required <?php if (isset($_POST['contact-subject'])) echo $_POST['contact-subject'] ? ' value="'.$_POST['contact-subject'].'"' : '' ?> />
                <label for="contact-subject">Subject</label>
            </div>

            <!-- Message body -->
            <div class="form-group">
                <textarea class="form-control" rows="10" id="contact-message" name="contact-message" required><?php if (isset($_POST['contact-message'])) echo $_POST['contact-message'] ? $_POST['contact-message'] : '' ?></textarea>
                <label for="contact-message">Your message</label>
            </div>

            <button id="submit-form" type="submit" name="submit" class="btn btn-primary btn-animation"><?php if ($_POST) echo $emailResponse ? "Message sent" : $failReason; else echo "Send message"; ?></button>
        </form>
    </div>

</main>
