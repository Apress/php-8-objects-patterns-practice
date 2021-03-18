<?php

declare(strict_types=1);

namespace popp\ch10\batch06;

/* listing 10.19 */
class DiamondPlains extends Plains
{
    public function getWealthFactor(): int
    {
        return parent::getWealthFactor() + 2;
    }
}
/* /listing 10.19 */
