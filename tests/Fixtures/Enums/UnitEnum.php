<?php

declare(strict_types=1);

namespace Outerweb\EnumHelpers\Tests\Fixtures\Enums;

use Outerweb\EnumHelpers\Traits\HasCollectionSupport;

enum UnitEnum
{
    use HasCollectionSupport;

    case Foo;
    case Bar;

    public function getLabel(): string
    {
        return match ($this) {
            self::Foo => 'Foo',
            self::Bar => 'Bar',
        };
    }
}
