<?php

declare(strict_types=1);

namespace Outerweb\EnumHelpers\Traits;

use BackedEnum;
use Outerweb\EnumHelpers\Collection\EnumCollection;

trait HasCollectionSupport
{
    public static function collect(?string $functionName = null): EnumCollection
    {
        if (! is_a(self::class, BackedEnum::class, true)) {
            throw new \LogicException('The collect method is only available on backed enums.');
        }

        return new EnumCollection(
            array_combine(
                array_map(
                    fn (BackedEnum $case) => $case->value,
                    self::cases()
                ),
                self::cases()
            )
        )
            ->when(
                ! is_null($functionName),
                function (EnumCollection $collection) use ($functionName) {
                    return match ($functionName) {
                        'value' => method_exists(self::class, 'value')
                            ? $collection->map(fn (self $enum) => $enum->{$functionName}())
                            : $collection->map(fn (self $enum) => $enum->value),
                        default => $collection->map(fn (self $enum) => $enum->{$functionName}()),
                    };
                }
            );
    }
}
