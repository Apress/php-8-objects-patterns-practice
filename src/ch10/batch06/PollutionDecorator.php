<?php

declare(strict_types=1);

namespace popp\ch10\batch06;

/* listing 10.26 */

class PollutionDecorator extends TileDecorator
{
    public function getWealthFactor(): int
    {
        return $this->tile->getWealthFactor() - 4;
    }
}
