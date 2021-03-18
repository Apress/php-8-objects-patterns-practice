<?php

declare(strict_types=1);

namespace popp\ch10\batch05;

/* listing 10.16 */
class TroopCarrier extends CompositeUnit
{
    public function addUnit(Unit $unit): void
    {
        if ($unit instanceof Cavalry) {
            throw new UnitException("Can't get a horse on the vehicle");
        }

        parent::addUnit($unit);
    }

    public function bombardStrength(): int
    {
        return 0;
    }
}
/* /listing 10.16 */
