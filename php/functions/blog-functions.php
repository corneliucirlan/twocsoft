<?php

	// SECURITY CHECK
	if (!defined('ABSPATH')) exit;


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
	function displayBlogPostDetails()
	{
		global $post;
		?>
		<div class="blog-post-details">
			Posted on <a href="<?php the_permalink() ?>"><?php echo get_the_date() ?></a> by <a href="<?php the_permalink() ?>"><?php the_author() ?></a>
		</div>
		<?php
	}
?>