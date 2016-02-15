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
		
		$category = get_the_category();
		$category = $category[sizeof($category)-1];
		?>
		<small class="blog-post-details row">
			<div class="no-padding-left col-md-8">
				<a class="category-link" href="<?php echo get_category_link($category->cat_ID) ?>"><?php echo $category->cat_name ?></a> - 
				<a href="<?php the_permalink() ?>"><?php echo get_the_date() ?></a>, by <a href="<?php the_permalink() ?>"><?php the_author() ?></a>
			</div>
			<div class="no-padding-right col-md-4">
				<?php renderShareButtons(true) ?>
			</div>
		</small>
		<?php
	}
?>