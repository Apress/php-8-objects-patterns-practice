<?php

declare(strict_types=1);

namespace popp\ch13\batch01;

class GenVenueCollection extends GenCollection
{
    public function targetClass(): string
    {
        return Venue::class;
    }
}
