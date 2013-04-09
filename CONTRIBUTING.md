# Contributing

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

`http://github.com/your_user_name/wordpress-google-cse/commits/new_branch_name`

If you have single-commit patches, it is fine to keep them on master. But do keep in mind that these changesets might be cherry-picked.

Once your changeset(s) are on github, select the appropriate branch containing your changes and send a pull request. Most of the description of your changes should be in the commit messages -- so no need to write a whole lot in the pull request message. However, the pull request message is a good place to provide a rationale or use case for the change if you think one is needed. More info on [pull requests](http://help.github.com/pull-requests/).