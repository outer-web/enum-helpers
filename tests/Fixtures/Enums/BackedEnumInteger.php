<?php

declare(strict_types=1);

namespace Outerweb\EnumHelpers\Tests\Fixtures\Enums;

use Outerweb\EnumHelpers\Traits\HasCollectionSupport;

enum BackedEnumInteger: int
{
    use HasCollectionSupport;

    case Foo = 1;
    case Bar = 2;

    public function getLabel(): string
    {
        return match ($this) {
            self::Foo => 'Foo',
            self::Bar => 'Bar',
        };
    }
}
