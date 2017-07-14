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
