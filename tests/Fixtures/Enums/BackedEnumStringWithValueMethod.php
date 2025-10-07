<?php

declare(strict_types=1);

namespace Outerweb\EnumHelpers\Tests\Fixtures\Enums;

use Outerweb\EnumHelpers\Traits\HasCollectionSupport;

enum BackedEnumStringWithValueMethod: string
{
    use HasCollectionSupport;

    case Foo = 'foo';
    case Bar = 'bar';

    public function value(): string
    {
        return match ($this) {
            self::Foo => 'Custom value for foo',
            self::Bar => 'Custom value for bar',
        };
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::Foo => 'Foo',
            self::Bar => 'Bar',
        };
    }
}
