<?php

    /**
     * Sidebar template file
     *
     * @link https://codex.wordpress.org/Template_Hierarchy
     *
     * @package ccwp
     */

	// Security check
	if (!defined('ABSPATH')) die;

?>

<?php

	// Connect to Twitter API
	use Abraham\TwitterOAuth\TwitterOAuth;
	$connection = new TwitterOAuth(get_option('twitter_customer_key'), get_option('twitter_customer_secret'), get_option('twitter_oauth_access_token'), get_option('twitter_oauth_access_token_secret'));

	// Get Twitter data
	$content = $connection->get("users/show", ["screen_name" => "corneliucirlan"]);

	// Get Twitter # of followers
	$wtitterFollowers = $content->followers_count;

	// Instagram
	$query = array(
		'access_token' => get_option('instagram_access_token'),
	);
	$url = 'https://api.instagram.com/v1/users/'.get_option('instagram_user_id').'?'.http_build_query($query);
	$instagram = ccwp\core\Tags::getCurlData($url);
	$instagramFollowers = $instagram->data->counts->followed_by;
	$query = array(
		'access_token'	=> get_option('facebook_access_token'),
		'fields'		=> "fan_count",
	);

	// Facebook
	$url = "https://graph.facebook.com/v3.0/corneliucirlan?".http_build_query($query);
	$facebook = ccwp\core\Tags::getCurlData($url);
	$facebookLikes = $facebook->fan_count;
?>

<aside class="col-md-4 no-gutter">

	<div class="sticky-top">

		<!-- Social media -->
		<div class="card-wrapper col-xs-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Follow me on social media</h3>
				</div>
				<div class="card-body text-center row">
					<div class="col">
						<a class="follow-me" href="<?php echo get_option('facebook_link') ?>" target="_blank">
							<i class="fa fa-facebook fa-2x"></i>
							<?php echo $facebookLikes ?> followers
						</a>
					</div>

					<div class="col">
						<a class="follow-me" href="<?php echo get_option('instagram_link') ?>" target="_blank">
							<div><i class="fa fa-instagram fa-2x"></i></div>
							<?php echo $instagramFollowers ?> followers
						</a>
					</div>

					<div class="col">
						<a class="follow-me" href="<?php echo get_option('twitter_link') ?>" target="_blank">
							<div><i class="fa fa-twitter fa-2x"></i></div>
							<?php echo $wtitterFollowers ?> followers
						</a>
					</div>
				</div>
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
						<li class="list-group-item"><a href="<?php echo get_category_link($category->cat_ID) ?>"><?php echo $category->cat_name ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>

</aside>
