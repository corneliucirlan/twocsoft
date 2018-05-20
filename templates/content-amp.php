<!doctype html>
<html amp <?php echo AMP_HTML_Utils::build_attributes_string($this->get('html_tag_attributes')); ?>>

    <head>
    	<meta charset="utf-8" />
    	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <?php do_action('amp_post_template_head', $this); ?>
    	<style amp-custom>
        	<?php echo file_get_contents(get_template_directory_uri().'/assets/css/amp.css'); ?>
    		<?php do_action('amp_post_template_css', $this); ?>
    	</style>
    </head>

    <body class="<?php echo esc_attr( $this->get('body_class')); ?>">

        <!-- Header -->
        <header id="#top" class="amp-wp-header">
        	<div>
        		<a href="<?php echo esc_url($this->get('home_url')); ?>">
                    <?php
                        $logoId = get_theme_mod('custom_logo');
                        if ($logoId && 'attachment' === get_post_type($logoId))
                            $siteLogo = wp_get_attachment_image_src($logoId, 'thumbnail', false);
                    ?>
                    <amp-img class="aligncenter amp-wp-site-icon" src="<?php echo esc_url($siteLogo[0]) ?>" width="64" height="64" alt="<?php bloginfo() ?>" />
        		</a>
        	</div>
            <?php ccwp\core\Tags::renderSocialProfiles('social-icons-header', 'fa-2x') ?>
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

            <?php ccwp\core\Tags::displayShareButtons(array('id' => get_the_id(), 'bottom' => false)) ?>

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
