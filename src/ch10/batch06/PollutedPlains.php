<?php

declare(strict_types=1);

namespace popp\ch10\batch06;

/* listing 10.20 */
class PollutedPlains extends Plains
{
    public function getWealthFactor(): int
    {
        return parent::getWealthFactor() - 4;
    }
}
/* /listing 10.20 */
