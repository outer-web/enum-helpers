<?php

declare(strict_types=1);

namespace Outerweb\EnumHelpers\Tests\Fixtures\Enums;

use Outerweb\EnumHelpers\Traits\HasCollectionSupport;

enum BackedEnumString: string
{
    use HasCollectionSupport;

    case Foo = 'foo';
    case Bar = 'bar';

    public function getLabel(): string
    {
        return match ($this) {
            self::Foo => 'Foo',
            self::Bar => 'Bar',
        };
    }
}
