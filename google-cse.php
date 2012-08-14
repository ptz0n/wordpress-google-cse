<?php
/*
Plugin Name: Google CSE
Description: Google powered Custom Search for your WordPress site or blog.
Version: 1.0
Author: Erik Eng
Author URI: http://erikeng.se/
License: GPLv2 or later
*/

/**
 * Define constants
 *
 * @constant string GCSE_VERSION Plugin version
 */
define('GCSE_VERSION', '0.1');

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
 * @param boolean $test
 *
 * @since 1.0
 *
 * @return array
 */
function gcse_request($test = false)
{
    $options = get_option('gcse_options');

    if(isset($options['key']) && $options['key'] &&
        isset($options['id']) && $options['id']) {
        $params = http_build_query(array(
            'key' => trim($options['key']),
            'cx'  => trim($options['id']),
            'alt' => 'json',
            'q'   => 'webb'/*get_search_query()*/));
        $url = 'https://www.googleapis.com/customsearch/v1?'.$params;

        if(function_exists('curl_version')) {
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL            => $url,
                CURLOPT_RETURNTRANSFER => (!$test ? 1 : 0)));
            $response = curl_exec($ch);
            curl_close($ch);
        }
        else {
            $response = file_get_contents($url);
        }
    }

    if(isset($response)) {
        return json_decode($response, true);
    }
    else {
        return array();
    }
}

/**
 * TODO: Cache
 *
 */