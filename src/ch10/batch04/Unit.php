<?php

declare(strict_types=1);

namespace popp\ch10\batch04;

/* listing 10.10 */
abstract class Unit
{
    public function addUnit(Unit $unit): void
    {
        throw new UnitException(get_class($this) . " is a leaf");
    }

    public function removeUnit(Unit $unit): void
    {
        throw new UnitException(get_class($this) . " is a leaf");
    }

    abstract public function bombardStrength(): int;
}
/* /listing 10.10 */
