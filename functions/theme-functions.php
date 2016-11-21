<?php

	/**
	 * Render single card
	 *
	 * @param  array $settings Various card settings
	 * @param  array $content  Card content, null by default
	 */
	function renderCard($settings, $content = null)
	{
		// Is singular post - eq blog post
		$isSingular = is_singular('post');

		?>
		<div class="card-wrapper <?= $settings['cardWrapper'] ?>">
			<div class="card <?= $isSingular ? 'card-flat' : '' ?>">

				<!-- Featured image - if necessary -->
				<?php if (!$isSingular): ?><a href="<?php the_permalink() ?>"><?php the_post_thumbnail(getPhotoSize()) ?></a><?php endif; ?>
				<div class="card-block">

					<!-- Post title -->
					<<?= $isSingular ? "h1" : "h3" ?> class="card-title">
						<?= array_key_exists('blogPost', $settings) ? '<a href="'.get_the_permalink().'">'.get_the_title().'</a>' : (is_array($content) && array_key_exists('title', $content) ? $content['title'] : get_the_title()) ?>
					</<?= $isSingular ? "h1" : "h3" ?>>

					<!-- Post details - if single blog post -->
					<?= $isSingular ? renderPostDetails() : '' ?>

					<!-- Post content/excerpt -->
					<?= is_singular() ? (is_array($content) && array_key_exists('content', $content) ? $content['content'] : the_content()) : the_excerpt() ?>
				</div>

			</div>
		</div>
		<?php
	}

	/**
	 * Render blog post details
	 *
	 */
	function renderPostDetails()
	{
		global $post;
		$categoriesText = '';

		// Get a list of categories with anchors
		$categories = get_the_category();
		foreach ($categories as $category):
			$categoriesText .= '<a class="card-link" href="'.get_category_link($category->cat_ID).'">'.$category->cat_name.'</a>&nbsp;|&nbsp;';
		endforeach;
		?>

		<div class="card-subtitle row text-muted">
			<div class="col-xs-8">
				<?= $categoriesText ?>
				<a href="<?php the_permalink() ?>"><?php echo get_the_date() ?></a>&nbsp;|&nbsp;
				<a rel="author" href="https://twitter.com/<?php the_author_meta('twitter') ?>" target="_blank"><i class="fa fa-twitter"></i><?php echo str_replace(' ', '', get_the_author()) ?></a>
			</div>
			<div class="col-xs-4">
				<?php displayShareButtons(array('id' => get_the_id(), 'alignRight' => true)) ?>
			</div>
		</div>
		<?php
	}

	/**
	 * Print one skill
	 */
	function printSkill($skill)
	{
		?>
		<div class="card-wrapper col-xs-12 col-sm-6 col-md-2">
			<div class="card card-flat card-borderless">
				<h3><?php echo $skill->getSkillName() ?></h3>
				<div class="item-stars text-xs-center">
					<?php
						for ($x = 1; $x <= 5; $x++):
							echo $x <= $skill->getSkillLevel() ? '<i class="fa fa-star"></i>' : '<i class="fa fa-star-o"></i>';
						endfor;
					?>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Get thumbnail photo size
	 *
	 * Uses PHP MobileDetect class
	 *
	 * @return string WP media size
	 */
	function getPhotoSize()
	{
		$detect = new Mobile_Detect();

		$size = 'medium';
		if ($detect->isMobile() && !$detect->isTablet()) $size = 'thumbnail';
			elseif ($detect->isTablet()) $size = 'medium';

		return $size;
	}


	/**
	 * Display share buttons
	 *
	 * @param  array $settings Array of various settings
	 */
	function displayShareButtons($settings)
	{
		// get url if page is category page
		if (array_key_exists('isCategory', $settings) && $settings['isCategory']):
				$url = urlencode(get_category_link($settings['id']));

			// or if tag page
			elseif (array_key_exists('isTag', $settings) && $settings['isTag']):
					$url = urlencode(get_tag_link($settings['id']));

				// or if normal page
				else:
					$url = urlencode(get_permalink($settings['id']));
		endif;

		// get page title
		$title = urlencode(get_post_meta(get_the_id(), '_yoast_wpseo_title', true) != '' ? get_post_meta(get_the_id(), '_yoast_wpseo_title', true) : get_the_title($settings['id']));

		// get page excerpt
		$excerpt = urlencode(get_the_excerpt());

		// set twitter related accounts
		$related = urlencode('corneliucirlan:Corneliu Cirlan');

		// get bitly short url
		$bitly = json_decode(file_get_contents('https://api-ssl.bitly.com/v3/shorten?access_token='.get_option('bitly_api_key').'&longUrl='.$url));

		// set url to bitly short url
		$url = $bitly->data->url;
		?>

		<ul class="social-icons <?php echo array_key_exists('alignRight', $settings) && $settings['alignRight'] == true ? ' ' : '' ?>">
			<li><span>Share:</span></li>
            <li class="share-button"><a class="social-link" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url ?>" title="Share on Facebook"><i class="fa fa-facebook"></i></a></li>
            <li class="share-button"><a class="social-link" target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo $title ?>&amp;url=<?php echo $url ?>&amp;related=<?php echo $related ?>" title="Share on Twitter"><i class="fa fa-twitter"></i></a></li>
            <li class="share-button"><a class="social-link" target="_blank" href="https://plus.google.com/share?url=<?php echo $url ?>" title="Share on Google+"><i class="fa fa-google-plus"></i></a></li>
            <li class="share-button"><a class="social-link" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $url ?>&amp;title=<?php echo $title ?>&amp;summary=<?php echo $excerpt ?>" title="Share on Linkedin"><i class="fa fa-linkedin"></i></a></li>
        </ul>
		<?php
	}

?>
