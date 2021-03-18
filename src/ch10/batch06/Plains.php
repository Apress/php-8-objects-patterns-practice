<?php

declare(strict_types=1);

namespace popp\ch10\batch06;

/* listing 10.23 */
/* listing 10.18 */
class Plains extends Tile
{
    private int $wealthfactor = 2;

    public function getWealthFactor(): int
    {
        return $this->wealthfactor;
    }
}
/* /listing 10.18 */
/* /listing 10.23 */
