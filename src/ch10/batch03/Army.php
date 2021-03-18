<?php

declare(strict_types=1);

namespace popp\ch10\batch03;

/* listing 10.07 */
class Army extends Unit
{
    private array $units = [];

    public function addUnit(Unit $unit): void
    {
        if (in_array($unit, $this->units, true)) {
            return;
        }

        $this->units[] = $unit;
    }

    public function removeUnit(Unit $unit): void
    {
        $idx = array_search($unit, $this->units, true);
        if (is_int($idx)) {
            array_splice($this->units, $idx, 1, []);
        }
    }

    public function bombardStrength(): int
    {
        $ret = 0;
        foreach ($this->units as $unit) {
            $ret += $unit->bombardStrength();
        }
        return $ret;
    }
/* /listing 10.07 */
    public function getUnits(): array
    {
        return $this->units;
    }
/* listing 10.07 */
}
/* /listing 10.07 */
