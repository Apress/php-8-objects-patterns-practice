<?php

declare(strict_types=1);

namespace popp\ch11\batch07;

/* listing 11.40 */
abstract class CompositeUnit extends Unit
{
    // ...
/* /listing 11.40 */
    private array $units = [];

    public function getComposite(): Unit
    {
        return $this;
    }

    public function units(): array
    {
        return $this->units;
    }

    public function removeUnit(Unit $unit): void
    {
        $units = [];

        foreach ($this->units as $thisunit) {
            if ($unit !== $thisunit) {
                $units[] = $thisunit;
            }
        }

        $this->units = $units;
    }

    public function addUnit(Unit $unit): void
    {
        if (in_array($unit, $this->units, true)) {
            return;
        }

        $this->units[] = $unit;
    }

    public function unitCount(): int
    {
        $count = 0;

        foreach ($this->units as $unit) {
            $count += $unit->unitCount();
        }

        return $count;
    }

/* listing 11.40 */
    public function textDump($num = 0): string
    {
        $txtout = parent::textDump($num);

        foreach ($this->units as $unit) {
            $txtout .= $unit->textDump($num + 1);
        }

        return $txtout;
    }
}
/* /listing 11.40 */
