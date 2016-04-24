<?php

	/**
	 * DISPLAY CARD
	 */
	function displayCard($settings, $content = false)
	{
		?>
		<div class="md-card-holder <?php echo $settings['containerClass'] ?>">
			<div class="md-card md-shadow-2dp">
				<div class="md-card-header">
			       	<h2 class="card-heading"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
					<?php if (array_key_exists('showCardDetails', $settings) && $settings['showCardDetails']) displayBlogPostDetails(array_key_exists('isSingle', $settings) && $settings['isSingle'] ? true : false) ?>
				</div>
				<div class="md-card-body">
					<?php the_post_thumbnail(getPhotoSize()) ?>
					<?php array_key_exists('isSingle', $settings) && $settings['isSingle'] ? the_content() : the_excerpt() ?>
				</div>
				<div class="md-card-footer <?php echo array_key_exists('buttons', $settings) ? 'row' : '' ?>">
						<?php if (array_key_exists('buttons', $settings)): ?>
								<div class="col-md-6">
									<?php foreach ($settings['buttons'] as $button): ?>
										<a href="<?php echo $button['url'] ?>" target="<?php echo $button['target'] ?>" class="btn btn-flat btn-brand waves-attach"><?php echo $button['label'] ?></a>
									<?php endforeach; ?>
								</div>
								<div class="item-footer-social col-md-6">
									<?php if (array_key_exists('showFooterShare', $settings)) displayShareButtons($settings['footerShareSettings']) ?>
								</div>

							<?php else: ?>
									<?php if (array_key_exists('showFooterShare', $settings)) displayShareButtons($settings['footerShareSettings']) ?>
						<?php endif; ?>
				</div>
			</div>
		</div>
		<?php
	}


	/**
	 * DISPLAY LATEST POSTS
	 */
	function displayRecentPosts($category, $numberOfPosts = 3)
	{
		$args = array(
			'post_type'			=> 'post',
			'post_status' 		=> 'publish',
			'order'				=> 'DESC',
			'category__in'		=> $category,
			'post__not_in'		=> array(get_the_id()),
			'posts_per_page'	=> $numberOfPosts,
		);
		$blogPosts = new WP_Query($args);
		?>
		<h2>Latest Posts</h2>
		<ul class="latest-posts">
			<?php while ($blogPosts->have_posts()): $blogPosts->the_post(); ?>
				<li><h4><a href="<?php the_permalink() ?>" target="_self"><?php the_title() ?></a></h4></li>
			<?php endwhile; ?>
		</ul>
		<?php
	}


	/**
	 * DISPLAY BLOG POST DETAILS
	 */
	function displayBlogPostDetails($singlePost = false)
	{
		global $post;
		$categoriesText = '';
		
		$categories = get_the_category();
		foreach ($categories as $category):
				$categoriesText .= '<a class="category-link" href="'.get_category_link($category->cat_ID).'">'.$category->cat_name.'</a>&nbsp;|&nbsp;';
		endforeach;

		?>
		<small class="blog-post-details row">
			<div class="no-padding-left <?php echo $singlePost ? 'col-md-8' : 'col-md-12' ?>">
				<?php echo $categoriesText ?>
				<a href="<?php the_permalink() ?>"><?php echo get_the_date() ?></a>&nbsp;|&nbsp;
				<i style="color: #1DA1F2;" class="fa fa-twitter"></i>&nbsp;<a rel="author" href="https://twitter.com/<?php the_author_meta('twitter') ?>" target="_blank">@<?php echo str_replace(' ', '', get_the_author()) ?></a>
			</div>
			<?php if ($singlePost): ?>
				<div class="no-padding-right col-md-4">
					<?php displayShareButtons(array('id' => get_the_id(), 'alignRight' => true)) ?>
				</div>
			<?php endif; ?>
		</small>
		<?php
	}
	

	/**
	 * PRINT ONE SKILL
	 */
	function printSkill($skill)
	{
		?>
		<article class="md-card-holder col-md-2 col-xs-4">
			<h3 style="text-transform: uppercase; font-size: 1.7rem;" class="subtitle"><?php echo $skill->getSkillName() ?></h3>
			<div class="item-stars">
				<?php
				for ($x = 1; $x <= 5; $x++):
					if ($x <= $skill->getSkillLevel()) echo '<span class="glyphicon glyphicon-star"></span>';
						else echo '<span class="glyphicon glyphicon-star-empty"></span>';
				endfor;
				?>
			</div>
		</article>
		<?php
	}

	/**
	 * PRINT ONE CERTIFICATION
	 */
	function printCertification($cert)
	{
		?>
		<article class="col-md-12">
			<h3><?php echo $cert->getCertName() ?></h3>
			<p class="text-center"><strong><?php echo strtoupper($cert->getCertOrganisation()) ?></strong></p>
			<p class="text-center"><?php echo strtoupper($cert->getCertYear()) ?></p>
		</article>
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
		$title = urlencode(get_the_title($settings['id']));
		
		// get page excerpt
		$excerpt = urlencode(get_the_excerpt());

		// set twitter related accounts
		$related = urlencode('corneliucirlan:Corneliu Cirlan');
		
		// get bitly short url
		$bitly = json_decode(file_get_contents('https://api-ssl.bitly.com/v3/shorten?access_token='.get_option('bitly_api_key').'&longUrl='.$url));
		
		// set url to bitly short url
		$url = $bitly->data->url;
		?>

		<ul class="share-buttons <?php echo array_key_exists('alignRight', $settings) && $settings['alignRight'] == true ? ' pull-right' : '' ?>">
			<li><span>Share:</span></li>
            <li class="share-button"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url ?>" title="Share on Facebook"><i class="fa fa-facebook"></i></a></li>
            <li class="share-button"><a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo $title ?>&amp;url=<?php echo $url ?>&amp;via=CorneliuCirlan&amp;related=<?php echo $related ?>" title="Share on Twitter"><i class="fa fa-twitter"></i></a></li>
            <li class="share-button"><a target="_blank" href="https://plus.google.com/share?url=<?php echo $url ?>" title="Share on Google+"><i class="fa fa-google-plus"></i></a></li>
            <li class="share-button"><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $url ?>&amp;title=<?php echo $title ?>&amp;summary=<?php echo $excerpt ?>" title="Share on Linkedin"><i class="fa fa-linkedin"></i></a></li>
        </ul>
		<?php
	}


	/**
	 * EDIT HEADER MENU
	 */
	add_filter('wp_nav_menu', 'custom_homepage', 10, 2);
	function custom_homepage($menu, $args)
	{
		if ('header-menu' == $args->theme_location)
		$menu = preg_replace('/Home/', '<i class="fa fa-home" style="font-size: 2rem;"></i>', $menu);

		return $menu;
	}

?>