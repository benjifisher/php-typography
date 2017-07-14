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
