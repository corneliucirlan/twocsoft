<?php

    /**
     * Tags class
     *
     * @package ccwp
     */

    namespace ccwp\core;

    use ccwp\api\callback\socialMediaCallbacks;

    class Tags
    {
        /**
         * Contrusct class to activate actions and hooks as soon as the class is initialized
         */
        public function __construct()
        {
            add_action('edit_category', array($this, 'categoryTransientFlusher'));
            add_action('save_post', array($this, 'categoryTransientFlusher'));
        }

        public static function postMeta()
        {
            ?>
            <div class="post-meta row text-muted">
    			<div class="meta-data col-12">
    				<?php the_category(', ') ?>&nbsp;/&nbsp;
    				<a href="<?php the_permalink() ?>"><?php echo get_the_date() ?></a>&nbsp;/&nbsp;
    				<a rel="author" href="https://twitter.com/<?php the_author_meta('twitter') ?>" target="_blank"><i class="fab fa-twitter no-animation"></i><?php echo str_replace(' ', '', get_the_author()) ?></a>
    			</div>
    		</div>
            <?php
        }

        /**
    	 * Display share buttons
    	 *
    	 * @param  array $settings Array of various settings
    	 */
    	public static function displayShareButtons($settings)
    	{
            // Get all available share sites
            $allSites = SocialMediaCallbacks::SOCIAL_MEDIA_SITES;

            // Get share sites
            $enabledSites = get_option("sms_profiles");

    		// Get url if page is category page
    		if (array_key_exists('isCategory', $settings) && $settings['isCategory']):
    				$permalink = urlencode(get_category_link($settings['id']));

    			// Or if tag page
    			elseif (array_key_exists('isTag', $settings) && $settings['isTag']):
    					$permalink = urlencode(get_tag_link($settings['id']));

    				// Or if normal page
    				else:
    					$permalink = urlencode(get_permalink($settings['id']));
    		endif;

    		// Get page title
    		$title = urlencode(get_post_meta(get_the_id(), '_yoast_wpseo_title', true) != '' ? get_post_meta(get_the_id(), '_yoast_wpseo_title', true) : get_the_title($settings['id']));

    		// Get page excerpt
    		$excerpt = urlencode(get_the_excerpt());

    		// Set twitter related accounts
    		$related = urlencode('corneliucirlan:Corneliu Cirlan');

    		// Get bitly short url
    		// $bitly = json_decode(file_get_contents('https://api-ssl.bitly.com/v3/shorten?access_token='.get_option('bitly_api_key').'&longUrl='.$url));

    		// Chekc if status code OK
    		// if (200 == $bitly->status_code)

    			// Set url to bitly short url
    			// $url = $bitly->data->url;

    		?>

    		<ul class="social-icons social-icons-share <?php echo $settings['classes'] ?>">
                <?php
                    foreach ($enabledSites as $site):

                        // Start creating the url
                        $url = $allSites[$site]['url'].'?';

                        // Set all url parameters
                        foreach ($allSites[$site]['urlParams'] as $param):

                            // if URL param
                            if ('u' === $param || 'url' === $param) $url = add_query_arg($param, $permalink, $url);

                            // if title param
                            if ('title' === $param) add_query_arg($param, $title, $url);

                            // if description param
                            if ('text' === $param || 'summary' === $param || 'description' === $param) $url = add_query_arg($param, $excerpt, $url);

                            // if media param
                            if ('media' === $param) $url = add_query_arg($param, get_the_post_thumbnail_url(get_the_ID(), 'large'), $url);
                        endforeach;

                        ?><li class="social-icon social-icon-<?php echo str_replace('_', '-', $site) ?>"><a class="social-link" target="_blank" rel="noreferrer" href="<?php echo urlencode($url); ?>" title="Share on <?php echo ucwords($site); ?>"><i class="fab fa-<?php echo $site; ?>"></i></a></li><?php
                    endforeach;
                ?>
            </ul>
    		<?php
    	}

        public static function entryFooter()
        {
            // Hide category and tag text for pages.
            if ('post' === get_post_type()):

                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list(esc_html__(', ', 'ccwp'));
                if ($categories_list && self::categorizedBlog()):
                    printf('<span class="cat-links">'.esc_html__('Posted in %1$s', 'ccwp').'</span>', $categories_list); // WPCS: XSS OK.
                endif;

                /* translators: used between list items, there is a space after the comma */
                $tags_list = get_the_tag_list('', esc_html__(', ', 'ccwp'));
                if ($tags_list):
                    printf('<span class="tags-links">'.esc_html__('Tagged %1$s', 'ccwp').'</span>', $tags_list); // WPCS: XSS OK.
                endif;
            endif;

            if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())):
                echo '<span class="comments-link">';
                /* translators: %s: post title */
                comments_popup_link(sprintf(wp_kses(__('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'ccwp'), array('span' => array('class' => array()))), get_the_title()));
                echo '</span>';
            endif;
            edit_post_link(
                sprintf(
                    /* translators: %s: Name of current post */
                    esc_html__('Edit %s', 'ccwp'),
                    the_title('<span class="screen-reader-text">"', '"</span>', false)
                ),
                '<span class="edit-link">',
                '</span>'
            );
        }

        public static function categorizedBlog()
        {
            if (false === ($all_the_cool_cats = get_transient('ccwp_categories'))):

                // Create an array of all the categories that are attached to posts.
                $all_the_cool_cats = get_categories(array(
                    'fields' => 'ids',
                    'hide_empty' => 1,
                    // We only need to know if there is more than one category.
                    'number' => 2,
                ));

                // Count the number of categories that are attached to the posts.
                $all_the_cool_cats = count($all_the_cool_cats);
                set_transient('ccwp_categories', $all_the_cool_cats);
            endif;

            if ($all_the_cool_cats > 1):

                    // This blog has more than 1 category so ccwp_categorized_blog should return true.
                    return true;
                else:

                    // This blog has only 1 category so ccwp_categorized_blog should return false.
                    return false;
            endif;
        }

        public function categoryTransientFlusher()
        {
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
                return;

            delete_transient('ccwp_categories');
        }

        /**
        * Get social media data via cURL
        *
        * @param  string $url URL to get data from
        * @return object      Rretreived data in JSON format
        */
        public static function getCurlData($url)
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

        /**
         * Render social media profiles section
         *
         * @param  string $location CSS class to determine section location
         * @param  string $iconSize FontAwesome CSS class to determine icons' size
         */
        public static function renderSocialProfiles($location = '', $iconSize = '')
        {
            $sites = array('facebook', 'instagram', 'twitter', 'behance', 'linkedin');

            ?>
            <ul class="social-icons <?php echo $location ?>">
                <?php foreach ($sites as $site): ?>
                    <li class="social-icon social-icon-<?php echo str_replace('_', '-', $site) ?>"><a class="social-link" target="_blank" rel="noreferrer" href="<?= get_option($site.'_link') ?>" title="Follow me on <?php echo ucwords(str_replace('_', ' ', $site)) ?>"><i class="fab fa-<?php echo str_replace('_', '-', $site) ?> <?php echo $iconSize ?>"></i></a></li>
                <?php endforeach; ?>
            </ul>
            <?php
        }
    }

?>
