<?php

declare(strict_types=1);

namespace popp\ch13\batch01;

/* listing 13.08 */
class VenueCollection extends Collection
{
    public function targetClass(): string
    {
        return Venue::class;
    }
}
