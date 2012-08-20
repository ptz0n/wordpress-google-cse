<?php
/*
Plugin Name: Google CSE
Plugin URI: http://wordpress.org/extend/plugins/google-cse/
Description: Google powered search for your WordPress site or blog.
Version: 1.0.1
Author: Erik Eng
Author URI: http://erikeng.se/
License: GPLv2 or later
*/

/**
 * Define constants
 *
 * @constant string GCSE_VERSION Plugin version
 */
define('GCSE_VERSION', '1.0');

/**
 * Security
 *
 */
if(!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

/**
 * Admin
 *
 */
if(is_admin()) {
    require_once dirname( __FILE__ ) . '/admin.php';
}

/**
 * TODO: Localization
 *
 */

/**
 * Google API Request
 *
 * @see wp_remote_get
 *
 * @param boolean $test
 *
 * @since 1.0
 *
 * @return array
 */
function gcse_request($test = false)
{
    global $wp_query;
    $options = get_option('gcse_options');

    if(isset($options['key']) && $options['key'] &&
        isset($options['id']) && $options['id']) {

        // Build URL
        $num    = $wp_query->query_vars['posts_per_page'] < 11 ?
            $wp_query->query_vars['posts_per_page'] : 10;
        $start  = $wp_query->query_vars['paged'] ?
            ($wp_query->query_vars['paged']-1)*$num+1 : 1;
        $params = http_build_query(array(
            'key'   => trim($options['key']),
            'cx'    => trim($options['id']),
            'alt'   => 'json',
            'num'   => $num,
            'start' => $start,
            'q'     => get_search_query()));
        $url    = 'https://www.googleapis.com/customsearch/v1?'.$params;

        // Check for and return cached response
        if($response = get_transient('gcse_'.md5($url))) {
            return json_decode($response, true);
        }

        // Request response
        $response = wp_remote_get($url);
    }

    // Save and return new response
    if(isset($response['body'])) {
        set_transient('gcse_'.md5($url), $response['body'], 3600);
        return json_decode($response['body'], true);
    }
    else {
        return array();
    }
}

/**
 * Search Results
 *
 * @since 1.0
 *
 */
function gcse_results()
{
    if(is_search()) {
        global $posts, $wp_query;
        $response = gcse_request();

        if(isset($response['items']) && $response['items']) {

            $results = array();
            foreach($response['items'] as $result) {
                if($id = gcse_url_to_postid($result['link'])) {
                    $post = get_post($id);
                }
                else {
                    $post = (object)array(
                        'post_title'   => $result['title'],
                        'post_excerpt' => $result['snippet'],
                        'post_content' => $result['htmlSnippet'],
                        'guid'         => $result['link'],
                        'post_type'    => 'search',
                        'ID'           => 0
                    );
                }
                $results[] = $post;
            }

            // TODO: Update $posts with new data

            // Set results as posts
            $posts = $results;

            // Update post count
            $wp_query->post_count = count($posts);

            // Pagination
            $posts_per_page = $wp_query->query_vars['posts_per_page'] < 11 ?
                $wp_query->query_vars['posts_per_page'] : 10;
            $wp_query->max_num_pages = ceil(
                $response['searchInformation']['totalResults'] /
                $posts_per_page);

            // Apply filters
            add_filter('the_permalink', 'gcse_permalink');
        }
    }
}
add_action('wp_head', 'gcse_results');

/**
 * URL to Post ID
 *
 * @param string $url
 *
 * @since 1.0
 *
 * @see url_to_postid
 * @see http://betterwp.net/wordpress-tips/url_to_postid-for-custom-post-types/
 *
 * @return int
 */
function gcse_url_to_postid($url)
{
    // TODO: Check url to post id map cache

    return url_to_postid($url);
}

/**
 * Permalink Filter
 *
 * @since 1.0
 *
 * @param string $the_permalink
 *
 * @return string
 *
 */
function gcse_permalink($the_permalink)
{
    if(is_main_query() && $the_permalink == '') {
        global $post;
        return $post->guid;
    }
    else {
        return $the_permalink;
    }
}