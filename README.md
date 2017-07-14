# PHP Typography

This repository will not be available for long.

This is an experiment to extract the `php-typography` directory from
[mundschenk-at/wp-typography](https://github.com/mundschenk-at/wp-typography)
in order to create a stand-alone library.

For the record:

```
$ git clone --recurse-submodules git@github.com:mundschenk-at/wp-typography.git php-typography
$ cd php-typography/
$ git checkout api-refactoring-2
$ git filter-branch --prune-empty --subdirectory-filter php-typography api-refactoring-2
$ git branch -D master
$ git gc --aggressive
```

The first few commits restore some of the scaffold files (`Gruntfile.js`, for
example) and the `tests` directory, then update them.
Maybe using `git filter-branch` was overkill.

The goal is to be able to install this project with

```
composer install mundschenk-at/php-typography
```

That will require creating an account on [Packagist](https://packagist.org/).
Until then, it should be possible to install with composer by adding a
`repositories` key to `composer.json`:  see
[Loading a package from a VCS repository](https://getcomposer.org/doc/05-repositories.md#loading-a-package-from-a-vcs-repository)
in the official `composer` docs.

If you want to provide a non-composer installation path, then you may want to
reject some of my changes to `Gruntfile.js`.

If you want to use this as a stand-alone project (in order to run tests for
example) then run

```
composer install
npm install
grun update:iana
grunt update:patterns
```

from the top-level directory.
(See
[Installation - Linux / Unix / OSX](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
or
[Installation - Windows](https://getcomposer.org/doc/00-intro.md#installation-windows)
if you do not already have `composer` installed.)
This will download the HTML5 parser and create an autoload file for it.

## Remaining tasks

1. Organize the classes according to the PSR-4 (or PSR-0) standard, or write a
   custom composer-compatible autoloader.
2. Remove explicit references to the `vendor/` directory. Rely on standard
   autoloading instead. This library will typically be included in another
   project's `vendor/` directory and not have one of its own.
3. Remove `Gruntfile.js`. Find another way to handle the remaining `grunt`
   tasks, including
    - Download https://data.iana.org/TLD/tlds-alpha-by-domain.txt
    - Download hyphenation patterns from CTAN.

## Running tests

```
$ composer install
$ npm install
$ grunt phpunit:default
```
