<?php

declare(strict_types=1);

namespace popp\ch10\batch01;

/* listing 10.01 */
class Archer extends Unit
{
    public function bombardStrength(): int
    {
        return 4;
    }
}
