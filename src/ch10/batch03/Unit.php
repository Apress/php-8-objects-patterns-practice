<?php

declare(strict_types=1);

namespace popp\ch10\batch03;

/* listing 10.06 */
abstract class Unit
{
    abstract public function addUnit(Unit $unit): void;
    abstract public function removeUnit(Unit $unit): void;
    abstract public function bombardStrength(): int;
}
/* /listing 10.06 */
