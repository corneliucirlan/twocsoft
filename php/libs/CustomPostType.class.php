<?php

	/**
	 * Custom Post Type Class
	 *
	 * @link https://github.com/corneliucirlan
	 *
	 * @author Corneliu Cirlan
	 * @link http://www.TwoCSoft.com
	 * @version 1.0
	 */

	class CustomPostType
	{
		protected $textdomain;
  		protected $posts;
		
		/**
		 * Class constructor
		 * @since 1.0
		 */
		public function __construct($textdomain)
		{
			// Initialize text domain
			$this->textdomain = $textdomain;
			
			// Initialize the posts array
			$this->posts = array();
			
			// Add the action hook calling the register_custom_post method
			add_action('init', array(&$this, 'register_custom_post'));

 		}
		

		public function make($type, $singularLabel, $pluralLabel, $settings = array())
		{
			$postType = array('type' => $type, 'textdomain' => $this->textdomain);
			
			// update "At a Glance" widget
			add_action('dashboard_glance_items', function($postType) use ($postType) {
				// get a specific CPT's details
				$pt_info = get_post_type_object($postType['type']); 
				
				// retrieve number of posts associated with this CPT
				$num_posts = wp_count_posts($postType['type']);
				
				// number of published posts for this CPT
				$num = number_format_i18n($num_posts->publish);
				
				// singular/plural text label for CPT
				$text = _n($pt_info->labels->singular_name, $pt_info->labels->name, intval($num_posts->publish), $postType['textdomain']);

				// render CPT number
				echo '<li class="post-count '.$pt_info->name.'-count"><a href="edit.php?post_type='.$postType['type'].'">'.$num.' '.$text.'</a></li>';
			});
			
			// Define the default settings
			$default_settings = array(
				'labels' 		=> array(
					'name'                => __($pluralLabel, $this->textdomain),
					'singular_name'       => __($singularLabel, $this->textdomain),
					'add_new'             => _x('Add New', $this->textdomain, $this->textdomain),
					'add_new_item'        => __('Add New '.$singularLabel, $this->textdomain),
					'edit_item'           => __('Edit '.$singularLabel, $this->textdomain),
					'new_item'            => __('New '.$singularLabel, $this->textdomain),
					'view_item'           => __('View '.$singularLabel, $this->textdomain),
					'search_items'        => __('Search '.$pluralLabel, $this->textdomain),
					'not_found'           => __('No '.$pluralLabel.' found', $this->textdomain),
					'not_found_in_trash'  => __('No '.$pluralLabel.' found in Trash', $this->textdomain),
					'parent_item_colon'   => __('Parent '.$singularLabel.':', $this->textdomain),
					'menu_name'           => __($pluralLabel, $this->textdomain),
				),
				'hierarchical'        => false,
				'description'         => 'description',
				'taxonomies'          => array('post_tag'),
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_admin_bar'   => true,
				'menu_position'       => 5,
				'menu_icon'           => 'dashicons-admin-post',
				'show_in_nav_menus'   => true,
				'publicly_queryable'  => true,
				'exclude_from_search' => false,
				'has_archive'         => true,
				'query_var'           => true,
				'can_export'          => true,
				'rewrite'             => array(
					'slug' => sanitize_title_with_dashes($pluralLabel)
				),
				'capability_type'     => 'post',
				'supports'            => array(
					'title',
					'editor',
					'author',
					'thumbnail',
					'excerpt',
					'custom-fields',
					'trackbacks',
					'comments',
					'revisions',
					'page-attributes',
					'post-formats',
				),
			);
			
			// Override any settings provided by user and store the settings with the posts array
			$this->posts[$type] = array_merge($default_settings, $settings);
		}
		
		public function register_custom_post()
		{
			// Loop through the registered posts and register all posts stored in the array
			foreach ($this->posts as $key => $value)
				register_post_type($key, $value);
		}
	}

?>