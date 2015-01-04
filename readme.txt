=== Google CSE ===
Contributors: ptz0n
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=PE92PZCYJSS9S
Tags: google, search, custom search engine, cse, custom search
Requires at least: 3.3
Tested up to: 3.5
Stable tag: 1.0.7
License: GPLv2 or later

Google powered search for your WordPress site or blog.

== Description ==

This is not another iframe embed or AJAX result listing plugin. Instead search results from your Google Custom Search Engine is served via WordPress search listing. No need to customize your theme or search box.

> You'll need to get an [Google API key](https://code.google.com/apis/console/) and a [Google Custom Search Engine ID](https://www.google.com/cse/) for it to work.

#### Features

* Search results sorting by relevance
* Works with all post types
* Multisite &amp; network support

Check out the [GitHub repo](https://github.com/ptz0n/wordpress-google-cse) for the latest development on this plugin.

#### Credits

* [Jonas Nordström](http://wordpress.org/support/profile/windyjonas)
* [Tom Ewer](http://wordpress.org/support/profile/tomewer)
* [Martel7](http://wordpress.org/support/profile/martel7)
* [Mike Garrett](http://wordpress.org/support/profile/mikengarrett)

== Installation ==

1. Place the plugin (`google-cse/` directory) in the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Enter and save your [Google API](https://code.google.com/apis/console/) key and [Google Custom Search Engine](https://www.google.com/cse/) ID.
4. You're done, celebrate with a cup of coffee?

If you want to use images from the Google result in your search result (`search.php`) use `$post->cse_img` for image URL.

== Screenshots ==

1. Search Results
2. Settings

== Changelog ==

= 1.0.7 =
* Added support for Phrase Search.

= 1.0.6 =
* Excluded admin from search hook

= 1.0.5 =
* Added `Settings` link to Plugins index
* Added option for disabling post matching

= 1.0.4 =
* Fixed memory leak caused by the query used to fetch posts by url.
* Fixed post variables WordPress was looking for.
* Fixed images returned by search results playing nicely.

= 1.0.3 =
* Added in featured images from Google results (use $post->cse_img for image URL)
* Fixed pagination bug

= 1.0.2 =
* Added more descriptive error messages to admin
* Disabled SSL check for `www.googleapis.com`

= 1.0.1 =
* Using native WordPress methods for remote requests

= 1.0 =
* Settings
* Search result cache

== Roadmap ==

* Support for [filtering and sorting](https://developers.google.com/custom-search/docs/structured_search)