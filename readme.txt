=== Google CSE ===
Contributors: ptz0n, MikeNGarrett
Donate link: https://flattr.com/thing/849734/WordPress-Google-CSE-Plugin
Tags: google, search, custom search engine, cse, custom search
Requires at least: 3.3
Tested up to: 3.5
Stable tag: 1.0.3
License: GPLv2 or later

Google powered search for your WordPress site or blog.

== Description ==

This is not another iframe embed or AJAX result listing plugin. Instead search results from your Google Custom Search Engine is served via WordPress search listing. No need to customize your theme or search box.

> You'll need an [Google API key](https://code.google.com/apis/console/) and a [Google Custom Search Engine ID](http://www.google.com/cse/) to use it.

#### Credits

* [Jonas Nordström](http://profiles.wordpress.org/windyjonas/)
* [Tom Ewer](http://wordpress.org/support/profile/tomewer)
* [Martel7](http://wordpress.org/support/profile/martel7)

== Installation ==

1. Place the plugin (`google-cse/` directory) in the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Enter and save your Google API key and Google Custom Search Engine ID.
4. You're done, celebrate with a cup of coffee?

== Screenshots ==

1. Settings

== Changelog ==

= 1.0.3 = 
* Added in featured images (use $post->cse_img for image url)
* Fixed pagination bug

= 1.0.2 =
* Added more descriptive error messages to admin
* Disabled SSL check for `www.googleapis.com`

= 1.0.1 =
* Using native WordPress methods for remote requests

= 1.0 =
* Settings
* Search result cache