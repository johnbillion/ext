# WP Extension Check

WP-CLI command which checks the existence of PHP extensions needed to run WordPress.

Quick links: [Using](#using) | [Installing](#installing) | [Contributing](#contributing) | [Support](#support)

## Using

This package implements the following commands:

### `wp ext required`

Checks the existence of extensions that are _required_ to run WordPress.

Example output:

```
$ wp ext required
+-----------+-----------+
| extension | installed |
+-----------+-----------+
| curl      | 1         |
| date      | 1         |
| dom       | 1         |
| filter    | 1         |
| ftp       | 1         |
| gd        | 1         |
| hash      | 1         |
| iconv     | 1         |
| json      | 1         |
| libxml    | 1         |
| mbstring  | 1         |
| mysqli    | 1         |
| openssl   | 1         |
| pcre      | 1         |
| posix     | 1         |
| SimpleXML | 1         |
| sockets   | 1         |
| SPL       | 1         |
| tokenizer | 1         |
| xml       | 1         |
| xmlreader | 1         |
| zlib      | 1         |
+-----------+-----------+
Success: All required extensions are installed
```

### `wp ext recommended`

Checks the existence of extensions that are _recommended_ to run WordPress.

Example output:

```
$ wp ext recommended
+-----------+-----------+
| extension | installed |
+-----------+-----------+
| gmagick   |           |
| ssh2      |           |
| exif      | 1         |
| imagick   | 1         |
+-----------+-----------+
Error: Some recommended extensions are not installed
```

### `wp ext check`

Checks the existence of all extensions that are either _required_ or _recommended_ to run WordPress.

Example output:

```
$ wp ext check
+-----------+-----------+
| extension | installed |
+-----------+-----------+
| gmagick   |           |
| ssh2      |           |
| curl      | 1         |
| date      | 1         |
| dom       | 1         |
| exif      | 1         |
| filter    | 1         |
| ftp       | 1         |
| gd        | 1         |
| hash      | 1         |
| iconv     | 1         |
| imagick   | 1         |
| json      | 1         |
| libxml    | 1         |
| mbstring  | 1         |
| mysqli    | 1         |
| openssl   | 1         |
| pcre      | 1         |
| posix     | 1         |
| SimpleXML | 1         |
| sockets   | 1         |
| SPL       | 1         |
| tokenizer | 1         |
| xml       | 1         |
| xmlreader | 1         |
| zlib      | 1         |
+-----------+-----------+
Error: Some extensions are not installed
```

## Installing

Installing this package requires WP-CLI's latest stable release. Update to the latest stable release with `wp cli update`.

Once you've done so, you can install this package with:

    wp package install git@github.com:johnbillion/ext.git

## Contributing

We appreciate you taking the initiative to contribute to this project.

Contributing isn’t limited to just code. We encourage you to contribute in the way that best fits your abilities, by writing tutorials, giving a demo at your local meetup, helping other users with their support questions, or revising our documentation.

For a more thorough introduction, [check out WP-CLI's guide to contributing](https://make.wordpress.org/cli/handbook/contributing/). This package follows those policy and guidelines.

### Reporting a bug

Think you’ve found a bug? We’d love for you to help us get it fixed.

Before you create a new issue, you should [search existing issues](https://github.com/johnbillion/ext/issues) to see if there’s an existing resolution to it, or if it’s already been fixed in a newer version.

Once you’ve done a bit of searching and discovered there isn’t an open or fixed issue for your bug, please [create a new issue](https://github.com/johnbillion/ext/issues/new). Include as much detail as you can, and clear steps to reproduce if possible. For more guidance, [review our bug report documentation](https://make.wordpress.org/cli/handbook/bug-reports/).

### Creating a pull request

Want to contribute a new feature? Please first [open a new issue](https://github.com/johnbillion/ext/issues/new) to discuss whether the feature is a good fit for the project.

Once you've decided to commit the time to seeing your pull request through, [please follow our guidelines for creating a pull request](https://make.wordpress.org/cli/handbook/pull-requests/) to make sure it's a pleasant experience. See "[Setting up](https://make.wordpress.org/cli/handbook/pull-requests/#setting-up)" for details specific to working on this package locally.

## Support

GitHub issues aren't for general support questions, but there are other venues you can try: https://wp-cli.org/#support
