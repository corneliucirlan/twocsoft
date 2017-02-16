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
			<div class="card">

				<!-- Featured image - if necessary -->
				<?php if (!$isSingular): ?><a href="<?php the_permalink() ?>"><?php the_post_thumbnail(getPhotoSize(true)) ?></a><?php endif; ?>
				<div class="card-block">

					<!-- Post title -->
					<<?= $isSingular ? "h1" : "h3" ?> class="card-title">
						<?= array_key_exists('blogPost', $settings) ? '<a href="'.get_the_permalink().'">'.get_the_title().'</a>' : (is_array($content) && array_key_exists('title', $content) ? $content['title'] : get_the_title()) ?>
					</<?= $isSingular ? "h1" : "h3" ?>>

					<!-- Post details - if single blog post -->
					<?= $isSingular ? renderPostDetails() : '' ?>

					<!-- Post content/excerpt -->
					<?= is_array($content) ? $content['content'] : ($isSingular ? the_content() : the_excerpt()) ?>

					<!-- Share buttons -->
					<?php if ($isSingular) displayShareButtons(array('id' => get_the_id(), 'bottom' => true)) ?>
				</div>

				<!-- Tags -->
				<?php if ($isSingular && get_the_tag_list()): ?>
					<div class="card-footer post-tags">
						<i class="fa fa-tag no-animation"></i>
						<?= get_the_tag_list('<ul class="tags"><li class="tag">', '</li><li class="tag">', '</li></ul>') ?>
					</div>
				<?php endif; ?>

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
		?>

		<div class="post-meta row text-muted">
			<div class="meta-data col-xs-12 col-md-8">
				<?= the_category(', ') ?>&nbsp;/&nbsp;
				<a href="<?php the_permalink() ?>"><?php echo get_the_date() ?></a>&nbsp;/&nbsp;
				<a rel="author" href="https://twitter.com/<?php the_author_meta('twitter') ?>" target="_blank"><i class="fa fa-twitter no-animation"></i><?php echo str_replace(' ', '', get_the_author()) ?></a>
			</div>
			<div class="post-share col-xs-12 col-md-4">
				<?php displayShareButtons(array('id' => get_the_id())) ?>
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
					<?php for ($x = 1; $x <= 5; $x++): ?>
						<?= $x <= $skill->getSkillLevel() ? '<i class="fa fa-star"></i>' : '<i class="fa fa-star-o"></i>'; ?>
					<?php endfor; ?>
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
	function getPhotoSize($featuredImage = false)
	{
		// Is featured image
		if ($featuredImage) return "thumbnail";

		// Create detect object
		$detect = new Mobile_Detect();

		// If mobile device
		if ($detect->isMobile()) return "thumbnail";
			else return "medium";
	}


	/**
	 * Display share buttons
	 *
	 * @param  array $settings Array of various settings
	 */
	function displayShareButtons($settings)
	{
		// Get url if page is category page
		if (array_key_exists('isCategory', $settings) && $settings['isCategory']):
				$url = urlencode(get_category_link($settings['id']));

			// Or if tag page
			elseif (array_key_exists('isTag', $settings) && $settings['isTag']):
					$url = urlencode(get_tag_link($settings['id']));

				// Or if normal page
				else:
					$url = urlencode(get_permalink($settings['id']));
		endif;

		// Get page title
		$title = urlencode(get_post_meta(get_the_id(), '_yoast_wpseo_title', true) != '' ? get_post_meta(get_the_id(), '_yoast_wpseo_title', true) : get_the_title($settings['id']));

		// Get page excerpt
		$excerpt = urlencode(get_the_excerpt());

		// Set twitter related accounts
		$related = urlencode('corneliucirlan:Corneliu Cirlan');

		// Get bitly short url
		$bitly = json_decode(file_get_contents('https://api-ssl.bitly.com/v3/shorten?access_token='.get_option('bitly_api_key').'&longUrl='.$url));

		// Chekc if status code OK
		if ($bitly->status_code == 200)

			// Set url to bitly short url
			$url = $bitly->data->url;

		// Check if share on card footer
		$cardFooter = array_key_exists('bottom', $settings) && $settings['bottom'] === true ? " footer-share" : "";
		?>

		<ul class="social-icons">
			<li class="share-button"><a class="social-link<?= $cardFooter ?>" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url ?>" title="Share on Facebook"><i class="fa fa-facebook"></i></a></li>
            <li class="share-button"><a class="social-link<?= $cardFooter ?>" target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo $title ?>&amp;url=<?php echo $url ?>&amp;related=<?php echo $related ?>" title="Share on Twitter"><i class="fa fa-twitter"></i></a></li>
            <li class="share-button"><a class="social-link<?= $cardFooter ?>" target="_blank" href="https://plus.google.com/share?url=<?php echo $url ?>" title="Share on Google+"><i class="fa fa-google-plus"></i></a></li>
            <li class="share-button"><a class="social-link<?= $cardFooter ?>" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $url ?>&amp;title=<?php echo $title ?>&amp;summary=<?php echo $excerpt ?>" title="Share on Linkedin"><i class="fa fa-linkedin"></i></a></li>
        </ul>
		<?php
	}

	/**
	 * Get social media data via cURL
	 * @param  string $url URL to get data from
	 * @return object      Rretreived data in JSON format
	 */
	function getCurlData($url)
	{
		$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	    $response = curl_exec($ch);
	    if($response === false) echo 'Curl error: ' . curl_error($ch);
	    	else $response = $response;

	    curl_close($ch);
	    return json_decode($response);
	}

?>
