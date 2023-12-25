<?php

namespace Outerweb\EnumHelpers\Collections;

use Illuminate\Support\Collection;

class EnumCollection extends Collection
{
    public function diff($items): static
    {
        return $this->reduce(function (self $carry, $item) use ($items) {
            if (! $items instanceof Collection) {
                $items = new static($items);
            }

            if (! $items->contains($item)) {
                $carry->push($item);
            }

            return $carry;
        }, new static);
    }
}
