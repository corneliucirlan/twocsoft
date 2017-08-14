<!doctype html>
<html amp <?php echo AMP_HTML_Utils::build_attributes_string($this->get('html_tag_attributes')); ?>>

    <head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />
        <?php do_action('amp_post_template_head', $this); ?>
    	<style amp-custom>
    		<?php echo file_get_contents(THEME_URI.'css/amp.css'); ?>
    		<?php do_action('amp_post_template_css', $this); ?>
    	</style>
    </head>

    <body class="<?php echo esc_attr( $this->get('body_class')); ?>">

        <!-- Header -->
        <header id="#top" class="amp-wp-header">
        	<div>
        		<a href="<?php echo esc_url( $this->get( 'home_url' ) ); ?>">
                    <amp-img class="aligncenter amp-wp-site-icon" src="<?= THEME_URI ?>img/logo.png" width="100" height="29" alt="<?php bloginfo() ?>" />
        		</a>
        	</div>
            <ul class="social-icons header-icons">
                <li><a class="social-link" target="_blank" href="<?= get_option('facebook_link') ?>" title="Follow me on Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a class="social-link" target="_blank" href="<?= get_option('instagram_link') ?>" title="Follow me on Instagram"><i class="fa fa-instagram"></i></a></li>
                <li><a class="social-link" target="_blank" href="<?= get_option('twitter_link') ?>" title="Follow me on Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a class="social-link" target="_blank" href="<?= get_option('google_plus_link') ?>" title="Follow me on Google+"><i class="fa fa-google-plus"></i></a></li>
                <li><a class="social-link" target="_blank" href="<?= get_option('linkedin_link') ?>" title="Follow me on Linkedin"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </header>

        <!-- Article -->
        <article class="amp-wp-article">

        	<header class="amp-wp-article-header">
        		<h1 class="card-title amp-wp-title"><?php echo wp_kses_data($this->get('post_title')); ?></h1>
        		<?php $this->load_parts(apply_filters('amp_post_article_header_meta', array('meta-author', 'meta-time'))); ?>
        	</header>

        	<?php $this->load_parts(array('featured-image')); ?>

        	<div class="amp-wp-article-content">
        		<?php echo $this->get( 'post_amp_content' ); // amphtml content; no kses ?>
        	</div>

            <?php displayShareButtons(array('id' => get_the_id(), 'bottom' => false)) ?>

        	<footer class="amp-wp-article-footer">
        		<?php //$this->load_parts(apply_filters('amp_post_article_footer_meta', array('meta-taxonomy'))); ?>

                <div class="card-footer post-tags">
                    <i class="fa fa-tag no-animation"></i>
                    <?= get_the_tag_list('<ul class="tags"><li class="tag">', '</li><li class="tag">', '</li></ul>') ?>
                </div>
        	</footer>

        </article>

        <!-- Footer -->
        <footer class="amp-wp-footer">
        	<div>
        		<h2><?php echo esc_html( $this->get( 'blog_name' ) ); ?></h2>
        		<a href="#top" class="back-to-top"><?php _e( 'Back to top', 'amp' ); ?></a>
        	</div>
        </footer>
    </body>
</html>
