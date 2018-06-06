# Recover cache when it has been corrupted, rendering the site inaccessible.

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

## Installation

Download or clone the repository, then copy the folder `CacheCrashie` to your site's `Addons` directory.

## Usage

The addon will add a command, which will loop through the site's locales, and check if any front page is inaccessible. If so the site cache will be cleared.

```sh
php please cache-crashie:recover
```

## Tasks

Enable the scheduler to run the command automatically every five minutes.
To setup the scheduler following the [Statamic docs](https://docs.statamic.com/addons/classes/tasks#starting).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
