<?php

	function renderBreadcrumbs()
	{
		global $wp_query;
		global $wpdb;

		echo '<ul class="breadcrumb">';
		
		// index page
		if (is_front_page()):
				echo '<li>'.get_bloginfo('name').'</li>';
			else:
				echo '<li><a href="'.get_option('home').'">'.get_bloginfo('name').'</a></li>';

				// home page (blog page)
				if (is_home()):
						echo '<li>'.get_the_title(get_option('page_for_posts', true)).'</li>';
					elseif (is_category()):
							global $cat;
					
							$category = get_category($cat);

							// PARENT CATEGORIES
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
						elseif (is_archive() && !is_category()):
								echo "<li>Archives</li>";
							elseif (is_search()):
									echo "<li>Search Results</li>";
								elseif (is_404()):
										echo "<li>404 Not Found</li>";
									elseif (is_single()):

											// POST CATEGORY
											$category = get_the_category();
											$category = $category[0];

											// PARENT CATEGORIES
											$categories = get_category_parents($category);
											$categories = explode('/', $categories);

											if ($categories)
												foreach ($categories as $key => $value):
													if (strlen($value) != 0):
														echo '<li><a href="'. get_category_link(get_cat_ID($categories[$key])) .'">'. $value .'</a></li>';
													endif;
												endforeach;

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

?>