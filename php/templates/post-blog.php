<?php

	// SECURITY CHECK
	if (!defined('ABSPATH')) exit;

?>

<div class="col-md-10 col-md-offset-1">
	<div class="row">
		<div class="blog-post-main col-md-8">
			<div class="card">
				<?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'medium') ?>
				<?php the_content() ?>
				<?php displayBlogPostDetails() ?>
				<?php previous_post_link() ?>
				<?php next_post_link() ?>
			</div>
			<div class="blog-post-tags">
				<?php
					$tags = get_tags();
					
					foreach ($tags as $key => $value)
						echo '<a href="'.get_the_permalink(PAGE_BLOG).'/tag/'.$value->slug.'"><span class="blog-post-tag">'.$value->name.'</span></a>&nbsp;';
				?>
			</div>
		</div>
		<div class="blog-post-sidebar col-md-4">
			<div class="card">
				<?php displayRecentPosts(CATEGORY_BLOG, 5) ?>
			</div>
		</div>
	</div>
</div>