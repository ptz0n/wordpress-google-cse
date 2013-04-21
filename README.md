# WordPress Google CSE

This is not another iframe embed or AJAX result listing plugin. Instead search results from your Google Custom Search Engine is served via WordPress search listing. No need to customize your theme or search box.

PS: You'll need an [Google API key](https://code.google.com/apis/console/) and a [Google Custom Search Engine ID](https://www.google.com/cse/) to use it. DS.

## Dependencies

* WordPress 3.3

## Features

* Search results sorting by relevance
* Works with all post types
* Multisite &amp; network support

## Installation

1. Place the plugin (`google-cse/` directory) in the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Enter and save your [Google API](https://code.google.com/apis/console/) key and [Google Custom Search Engine](https://www.google.com/cse/) ID.
4. You're done, celebrate with a cup of coffee?

If you want to use images from the Google result in your search result (`search.php`) use `$post->cse_img` for image URL.

## Feedback and questions

Found a bug or missing a feature? Don't hesitate to create a new issue on [GitHub](https://github.com/ptz0n/wordpress-google-cse/issues) or contact me [directly](https://github.com/ptz0n).

## Credits

* [Jonas Nordström](https://github.com/windyjonas)
* [Andreas Karlsson](https://github.com/indiebytes)
* [Tom Ewer](https://twitter.com/tomewer)
* [Martel7](http://wordpress.org/support/profile/martel7)
* [Mike Garrett](https://github.com/MikeNGarrett)

## Changelog

### 1.0.6
* Excluded admin from search hook

### 1.0.5
* Added `Settings` link to Plugins index
* Added option for disabling post matching

### 1.0.4
* Fixed memory leak caused by the query used to fetch posts by url.
* Fixed post variables WordPress was looking for.
* Fixed images returned by search results playing nicely.

### 1.0.3
* Added in featured images from Google results (use $post->cse_img for image URL)
* Fixed pagination bug

### 1.0.2
* Added more descriptive error messages to admin
* Disabled SSL check for `www.googleapis.com`.

### 1.0.1
* Using native WordPress methods for remote requests

### 1.0
* Settings
* Search result cache
