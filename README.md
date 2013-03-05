# WordPress Google CSE

This is not another iframe embed or AJAX result listing plugin. Instead search results from your Google Custom Search Engine is served via WordPress search listing. No need to customize your theme or search box.

PS: You'll need an [Google API key](https://code.google.com/apis/console/) and a [Google Custom Search Engine ID](http://www.google.com/cse/) to use it. DS.

## Dependencies

* WordPress 3.3

## Installation

1. Place the plugin (`google-cse/` directory) in the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Enter and save your Google API key and Google Custom Search Engine ID
4. You're done, celebrate with a cup of coffee?

## Feedback and questions

Found a bug or missing a feature? Don't hesitate to create a new issue on [GitHub](https://github.com/ptz0n/wordpress-google-cse) or contact me [directly](https://github.com/ptz0n).

## Credits

* [Jonas Nordström](https://github.com/windyjonas)
* [Andreas Karlsson](https://github.com/indiebytes)
* [Tom Ewer](https://twitter.com/tomewer)
* [Martel7](http://wordpress.org/support/profile/martel7)
* [MikeNGarrett](https://github.com/mikengarrett)

## Changelog
### 1.0.4 
* Fixed memory leak caused by the query used to fetch posts by url.
* Fixed post variables WordPress was looking for.
* Fixed images returned by search results playing nicely.

### 1.0.3
* Added in featured images (use $post->cse_img for image url)
* Fixed pagination bug

### 1.0.2
* Added more descriptive error messages to admin
* Disabled SSL check for `www.googleapis.com`.

### 1.0.1
* Using native WordPress methods for remote requests

### 1.0
* Settings
* Search result cache