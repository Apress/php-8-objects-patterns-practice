<?php

declare(strict_types=1);

namespace popp\ch10\batch04;

class Soldier extends Unit
{
    public function addUnit(Unit $unit): void
    {
    }
    public function removeUnit(Unit $unit): void
    {
    }

    public function bombardStrength(): int
    {
        return 8;
    }
}
