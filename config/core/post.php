<?php

    /**
     * Post class
     *
     * @package cornelius
     */

    namespace cornelius\core;

    use cornelius\api\callback\themeSettingsCallbacks;

    class Post
    {
        /**
         * Contrusct class to activate actions and hooks as soon as the class is initialized
         */
        public function __construct()
        {
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
    	public static function shareButtons($settings)
    	{
            // Get all available share sites
            $allSites = ThemeSettingsCallbacks::SOCIAL_MEDIA_SITES;

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
    		// $bitly = json_decode(file_get_contents('https://api-ssl.bitly.com/v3/shorten?access_token='.get_option('bitly_api_key').'&longUrl='.$permalink));

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

        public static function postTags()
        {
            // Check if correct post type and has tags
            if ('post' === get_post_type() && has_tag()):
                ?>
                <div class="post-tags">
            		<i class="fas fa-tags fa-2x no-animation"></i>
            		<?php echo get_the_tag_list('<ul class="tags"><li class="tag">', '</li><li class="tag">', '</li></ul>') ?>
            	</div>
                <?php
            endif;
        }

        /**
         * Render social media profiles section
         *
         * @param  string $location CSS class to determine section location
         * @param  string $iconSize FontAwesome CSS class to determine icons' size
         */
        public static function socialProfiles($location = '', $iconSize = '')
        {
            $sites = array('facebook-f', 'instagram', 'twitter', 'linkedin-in', 'behance', 'dribbble', 'github');

            ?>
            <ul class="social-icons <?php echo $location ?>">
                <?php foreach ($sites as $site): ?>
                    <li class="social-icon social-icon-<?php echo str_replace('_', '-', $site) ?>"><a class="social-profile" target="_blank" rel="noreferrer" href="<?= get_option($site.'_link') ?>" title="Follow me on <?php echo ucwords(str_replace('_', ' ', $site)) ?>"><i class="fab fa-<?php echo str_replace('_', '-', $site) ?> <?php echo $iconSize ?>"></i></a></li>
                <?php endforeach; ?>
            </ul>
            <?php
        }
    }

?>
