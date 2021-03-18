<?php

declare(strict_types=1);

namespace popp\ch10\batch06;

/* listing 10.25 */

class DiamondDecorator extends TileDecorator
{
    public function getWealthFactor(): int
    {
        return $this->tile->getWealthFactor() + 2;
    }
}
