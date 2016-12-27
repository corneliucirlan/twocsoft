<?php

	// Security check
	if (!defined('ABSPATH')) die;

?>


<?php

	// Connect to Twitter API
	use Abraham\TwitterOAuth\TwitterOAuth;
	$connection = new TwitterOAuth(get_option('twitter_customer_key'), get_option('twitter_customer_secret'), get_option('twitter_oauth_access_token'), get_option('twitter_oauth_access_token_secret'));

	// Get banner image
	$content = $connection->get("users/profile_banner", ['screen_name' => 'corneliucirlan']);
	$coverPhoto = $content->sizes->web;

	// Profile image
	$content = $connection->get("users/show", ["screen_name" => "corneliucirlan"]);

	// Set profile
	$twitterProfile = array(
		"id"		=> $content->id,
		"name"		=> $content->name,
		"url"		=> get_option('twitter_link'),
		"followers"	=> $content->followers_count,
		"image"		=> $content->profile_image_url_https ? $content->profile_image_url_https : $content->profile_image_url,
		"cover"		=> $coverPhoto,
	);

?>

<aside class="col-md-4">

	<!-- Twitter -->
	<div class="card-wrapper col-xs-12">
		<div class="card">
			<div class="twitter-box" style="background: url('<?= $twitterProfile['cover']->url ?>') center center no-repeat; background-size: cover; width: 100%; height: 150px">
				<div class="twitter-overlay"></div>

				<div class="wrapper">
					<!-- Profile -->
					<div class="twitter-profile">
						<div class="twitter-profile-image">
							<a href="<?= $twitterProfile['url'] ?>" target="_blank"><img src="<?= $twitterProfile['image'] ?>" alt="<?= bloginfo() ?> Twitter profile" /></a>
						</div>
						<p class="twitter-profile-name"><a href="<?= $twitterProfile['url'] ?>" target="_blank" title="<?= bloginfo() ?>"><?= $twitterProfile['name'] ?></a></p>
						<p class="twitter-profile-followers"><?= $twitterProfile['followers'] ?> followers</p>
					</div>

					<!-- Follow button -->
					<div class="twitter-follow-wrapper">
						<a class="twitter-follow-button" data-size="large" data-show-count="false" data-show-screen-name="false" href="https://twitter.com/corneliucirlan">Follow @CorneliuCirlan</a>
					</div>

					<!-- Message button -->
					<div class="twitter-message-wrapper">
						<a class="twitter-dm-button" data-size="large" data-screen-name="@CorneliuCirlan"  href="https://twitter.com/messages/compose?recipient_id=<?= $twitterProfile['id'] ?>">Message @CorneliuCirlan</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Facebook -->
	<div class="card-wrapper col-xs-12">
		<div class="card">
			<div class="fb-page" data-href="https://www.facebook.com/corneliucirlan/" data-tabs="false" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-width="500" data-show-facepile="false"><blockquote cite="https://www.facebook.com/corneliucirlan/" class="fb-xfbml-parse-ignore"><a class="text-center" href="https://www.facebook.com/corneliucirlan/"><?php bloginfo('name') ?> on Facebook</a></blockquote></div>
		</div>
	</div>

	<!-- Categories -->
	<div class="card-wrapper col-xs-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Categories</h3>
			</div>
			<ul class="list-group list-group-flush">
				<?php $categories = get_categories(); ?>
				<?php foreach ($categories as $category): ?>
					<li class="list-group-item"><a href="<?= get_category_link($category->cat_ID) ?>"><?= $category->cat_name ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</aside>
