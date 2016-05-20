<?php

	function renderBreadcrumbs()
	{
		global $wp_query;
		global $wpdb;

		echo '<ul class="breadcrumb">';
		
		// index page
		if (is_front_page()):
				echo '<li>Home</li>';
			else:
				echo '<li><a href="'.get_option('home').'">Home</a></li>';

				// home page (blog page)
				if (is_home()):
						echo '<li>'.get_the_title(get_option('page_for_posts', true)).'</li>';
					elseif (is_category()):
							global $cat;

							// print main blog page
							$blogPageID = get_option('page_for_posts');
							echo '<li><a href="'.get_permalink($blogPageID).'">'.get_the_title($blogPageID).'</a></li>';
					
							// get current category
							$category = get_category($cat);
							
							// parent categories
							$categories = get_category_parents($category);
							$categories = explode('/', $categories);

							if ($categories):
								foreach ($categories as $key => $value):
									if (strlen($value) != 0):
										if (get_cat_ID($categories[$key]) == $cat) echo '<li>'. $value .'</li>';
											else echo '<li><a href="'. get_category_link(get_cat_ID($categories[$key])) .'">'. $value .'</a></li>';
									endif;
								endforeach;
							endif;

						elseif (is_tag()):
								
								// print main blog page
								$blogPageID = get_option('page_for_posts');
								echo '<li><a href="'.get_permalink($blogPageID).'">'.get_the_title($blogPageID).'</a></li>';
								
								// print current tag page
								$currentTag = single_tag_title("", false);
								echo '<li>'.$currentTag.'</li>';

						elseif (is_archive()):

								// current taxonomy
								$currentTaxonomy = get_query_var($wp_query->query_vars['taxonomy']);
								
								// taxonomy term
								$tax = get_term_by('slug', $currentTaxonomy, $wp_query->query_vars['taxonomy']);
								
								if ($currentTaxonomy):
								    $taxObject = get_taxonomy($tax->taxonomy);
								    $postTypeArray = $taxObject->object_type;
								    //var_dump($postTypeArray);

								    $parentPage = get_page_by_path($postTypeArray[0]);

								    echo '<li><a href="'.get_permalink($parentPage->ID).'">'.$parentPage->post_title.'</a></li>';
								endif;

								echo "<li>".$tax->name."</li>";
							elseif (is_search()):
									echo "<li>Search Results</li>";
								elseif (is_404()):
										echo "<li>404 Not Found</li>";
									elseif (is_single()):

											// Get WP post object
											global $post;

											// If current post is WP default blog post
											if ($post->post_type == 'post'):
													if (get_option('show_on_front') == 'page'):
														$blogPageID = get_option('page_for_posts');
														echo '<li><a href="'.get_permalink($blogPageID).'">'.get_the_title($blogPageID).'</a></li>';
													endif;

												// else is custom post type
												else:
													$parentPage = get_page_by_path($post->post_type);
													echo '<li><a href="'.get_permalink($parentPage->ID).'">'.$parentPage->post_title.'</a></li>';
												
											endif;

											
											// CURRENT PAGE
											echo '<li>'.the_title('','', FALSE) ."</li>";
										elseif (is_page()):
											$post = $wp_query->get_queried_object();

											if ($post->post_parent == 0):
													if (!is_home() && !is_front_page()):
														echo "<li>".the_title('','', FALSE)."</li>";
													endif;
												else:
													$title = the_title('','', FALSE);
													$ancestors = array_reverse(get_post_ancestors($post->ID));
													array_push($ancestors, $post->ID);
													foreach ($ancestors as $ancestor):
														if ($ancestor != end($ancestors))
															echo '<li><a href="'. get_permalink($ancestor) .'">'. strip_tags(apply_filters('single_post_title', get_the_title($ancestor))) .'</a></li>';
															else
																echo '<li>'. strip_tags(apply_filters('single_post_title', get_the_title($ancestor))) .'</li>';
													endforeach;
											endif;
				endif;
		endif; // end front_page

		echo '</ul>';
	}


	// Register settings page
	add_action('admin_menu', function() {
		add_options_page(__('Breadcrumbs settings'), __('Breadcrumbs'), 'manage_options', 'breadcrumbs', 'renderBreadcrumbsSettings');
	});


	// Render breadcrumbs settings
	function renderBreadcrumbsSettings()
	{
		?>
		<div class="wrap">
			<h2><?php _e('Breadcrumbs settings') ?></h2>
		</div>
		<?php
	}

?>