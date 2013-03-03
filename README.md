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

## Contributing

Fork repo to your account. Go to the [main repo](https://github.com/ptz0n/wordpress-google-cse) and click the _Fork_ button.

### Making Trivial Changes

Thanks to GitHub, making small changes is super easy. After forking the project navigate to the file you want to change and click the _Edit_ link.

Change the file, write a commit message, and click the _Commit_ button.

Now you need to get your change accepted.

### Submitting Patches

If you are submitting features that have more than one changeset, please create a topic branch to hold the changes while they are pending merge and also to track iterations to the original submission. To create a topic branch:

    $ git checkout -b new_branch_name
    ... make more commits if needed ...
    $ git push origin new_branch_name

You can now see these changes online at a url like:

`http://github.com/your_user_name/wordpress-google-cse/commits/new_branch_name

If you have single-commit patches, it is fine to keep them on master. But do keep in mind that these changesets might be cherry-picked.

Once your changeset(s) are on github, select the appropriate branch containing your changes and send a pull request. Most of the description of your changes should be in the commit messages -- so no need to write a whole lot in the pull request message. However, the pull request message is a good place to provide a rationale or use case for the change if you think one is needed. More info on [pull requests](http://help.github.com/pull-requests/).