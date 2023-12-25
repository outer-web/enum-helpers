<?php

namespace Outerweb\EnumHelpers\Traits;

use Outerweb\EnumHelpers\Collections\EnumCollection;

trait HasCollectionSupport
{
    public static function collect(?string $functionName = null): EnumCollection
    {
        $collection = new EnumCollection(
            array_combine(
                array_map(
                    fn ($case) => $case->value,
                    self::cases()
                ),
                self::cases()
            )
        );

        if ($functionName && method_exists(self::class, $functionName)) {
            $collection = $collection->mapWithKeys(fn (self $case) => [$case->value => $case->$functionName()]);
        }

        return $collection;
    }
}
