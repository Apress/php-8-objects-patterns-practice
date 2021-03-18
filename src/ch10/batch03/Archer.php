<?php

declare(strict_types=1);

namespace popp\ch10\batch03;

/* listing 10.09 */
class Archer extends Unit
{
    public function addUnit(Unit $unit): void
    {
        throw new UnitException(get_class($this) . " is a leaf");
    }

    public function removeUnit(Unit $unit): void
    {
        throw new UnitException(get_class($this) . " is a leaf");
    }

    public function bombardStrength(): int
    {
        return 4;
    }
}
