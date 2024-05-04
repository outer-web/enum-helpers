![Enum Helpers banner](docs/images/banner.png)

# Enum Helpers

[![Latest Version on Packagist](https://img.shields.io/packagist/v/outerweb/enum-helpers.svg?style=flat-square)](https://packagist.org/packages/outerweb/enum-helpers)
[![Total Downloads](https://img.shields.io/packagist/dt/outerweb/enum-helpers.svg?style=flat-square)](https://packagist.org/packages/outerweb/enum-helpers)

This package provides Laravel specific helpers for working with enums.

- \Illuminate\Support\Collection support via the `HasCollectionSupport` trait.

## Installation

You can install the package via composer:

```bash
composer require outerweb/enum-helpers
```

## Usage

### Collection support

```php
use Outerweb\EnumHelpers\HasCollectionSupport;

enum Status: string
{
    use HasCollectionSupport;

    const Open = 'open';
    const Closed = 'closed';

    public function label(): string
    {
        return match ($this->value) {
            self::Open => 'Open',
            self::Closed => 'Closed',
        };
    }
}
```

You can now get a collection of all th cases by calling:

```php
Status::collect();
```

You can also get a collection of all the labels by calling:

```php
Status::collect('label');
```

## Suggestions?

If you have any suggestions for extra enum helpers, please create an issue or a pull request.

## Laravel support

| Laravel Version | Package version |
| --------------- | --------------- |
| ^11.0           | ^1.0.1          |
| ^10.0           | ^1.0.0          |

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Simon Broekaert](https://github.com/SimonBroekaert)
- [All Contributors](../../contributors)

## License

MIT License (MIT). Read the [License File](LICENSE.md) for more information.
