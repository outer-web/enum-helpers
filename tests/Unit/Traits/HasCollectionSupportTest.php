<?php

declare(strict_types=1);

use Illuminate\Support\Collection;
use Outerweb\EnumHelpers\Tests\Fixtures\Enums\BackedEnumInteger;
use Outerweb\EnumHelpers\Tests\Fixtures\Enums\BackedEnumIntegerWithValueMethod;
use Outerweb\EnumHelpers\Tests\Fixtures\Enums\BackedEnumString;
use Outerweb\EnumHelpers\Tests\Fixtures\Enums\BackedEnumStringWithValueMethod;
use Outerweb\EnumHelpers\Tests\Fixtures\Enums\UnitEnum;

describe('BackedEnum (string)', function (): void {
    it('can collect all cases', function (): void {
        expect(BackedEnumString::collect())
            ->toBeInstanceOf(Collection::class)
            ->toContainOnlyInstancesOf(BackedEnumString::class)
            ->toContain(BackedEnumString::Foo, BackedEnumString::Bar)
            ->toHaveKeys(['foo', 'bar']);
    });

    it('can collect all values via collect("value")', function (): void {
        expect(BackedEnumString::collect('value'))
            ->toBeInstanceOf(Collection::class)
            ->toContain('foo', 'bar')
            ->toHaveKeys(['foo', 'bar']);
    });

    it('calls a user defined value() function when calling collect("value") and the user defined value() function exists', function (): void {
        expect(BackedEnumStringWithValueMethod::collect('value'))
            ->toBeInstanceOf(Collection::class)
            ->toContain('Custom value for foo', 'Custom value for bar')
            ->toHaveKeys(['foo', 'bar']);
    });

    it('can collect all returned values from a method', function (): void {
        expect(BackedEnumString::collect('getLabel'))
            ->toBeInstanceOf(Collection::class)
            ->toContain('Foo', 'Bar')
            ->toHaveKeys(['foo', 'bar']);
    });

    it('can use the \'diff\' collection method', function (): void {
        expect(BackedEnumString::collect()->diff([
            BackedEnumString::Foo,
        ]))
            ->toBeInstanceOf(Collection::class)
            ->toHaveCount(1)
            ->toContain(BackedEnumString::Bar)
            ->toHaveKeys(['bar'])
            ->not->toContain(BackedEnumString::Foo)
            ->not->toHaveKeys(['foo']);
    });
});

describe('BackedEnum (int)', function (): void {
    it('can collect all cases', function (): void {
        expect(BackedEnumInteger::collect())
            ->toBeInstanceOf(Collection::class)
            ->toContainOnlyInstancesOf(BackedEnumInteger::class)
            ->toContain(BackedEnumInteger::Foo, BackedEnumInteger::Bar)
            ->toHaveKeys([1, 2]);
    });

    it('can collect all values via collect("value")', function (): void {
        expect(BackedEnumInteger::collect('value'))
            ->toBeInstanceOf(Collection::class)
            ->toContain(1, 2)
            ->toHaveKeys([1, 2]);
    });

    it('calls a user defined value() function when calling collect("value") and the user defined value() function exists', function (): void {
        expect(BackedEnumIntegerWithValueMethod::collect('value'))
            ->toBeInstanceOf(Collection::class)
            ->toContain('Custom value for foo', 'Custom value for bar')
            ->toHaveKeys([1, 2]);
    });

    it('can collect all returned values from a method', function (): void {
        expect(BackedEnumInteger::collect('getLabel'))
            ->toBeInstanceOf(Collection::class)
            ->toContain('Foo', 'Bar')
            ->toHaveKeys([1, 2]);
    });

    it('can use the \'diff\' collection method', function (): void {
        expect(BackedEnumInteger::collect()->diff([
            BackedEnumInteger::Foo,
        ]))
            ->toBeInstanceOf(Collection::class)
            ->toHaveCount(1)
            ->toContain(BackedEnumInteger::Bar)
            ->toHaveKeys([2])
            ->not->toContain(BackedEnumInteger::Foo)
            ->not->toHaveKeys([1]);
    });
});

describe('UnitEnum', function (): void {
    it('throws a logic exception because it does not support UnitEnums', function (): void {
        /** @var TestCase $this */
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('The collect method is only available on backed enums.');

        UnitEnum::collect();
    });
});
