# Enum Helpers

[![Latest Version on Packagist](https://img.shields.io/packagist/v/outerweb/enum-helpers.svg?style=flat-square)](https://packagist.org/packages/outerweb/enum-helpers)
[![Total Downloads](https://img.shields.io/packagist/dt/outerweb/enum-helpers.svg?style=flat-square)](https://packagist.org/packages/outerweb/enum-helpers)

This package provides Laravel specific helpers for working with enums.

-   \Illuminate\Support\Collection support

## Installation

You can install the package via composer:

```bash
composer require outerweb/enum-helpers
```

## Usage

Just add the specific trait to your enum class:

```php
use Outerweb\EnumHelpers\Traits\HasCollectionSupport;

class MyEnum extends Enum
{
    use HasCollectionSupport;
}
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

-   [Simon Broekaert](https://github.com/SimonBroekaert)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
