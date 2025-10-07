<?php

declare(strict_types=1);

namespace Outerweb\EnumHelpers\Collection;

use Illuminate\Support\Collection;
use Override;

class EnumCollection extends Collection
{
    #[Override]
    public function diff($items): self
    {
        return $this->reduce(function (self $carry, $item) use ($items) {
            if (! $items instanceof Collection) {
                $items = new self($items);
            }

            if (! $items->contains($item)) {
                $carry->put($item->value, $item);
            }

            return $carry;
        }, new self);
    }
}
