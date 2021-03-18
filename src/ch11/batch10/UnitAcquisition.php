<?php

declare(strict_types=1);

namespace popp\ch11\batch10;

use popp\ch11\batch08\Army;
use popp\ch11\batch08\Archer;
use popp\ch11\batch08\Cavalry;
use popp\ch11\batch08\LaserCanonUnit;

/* listing 11.56 */
class UnitAcquisition
{
    public function getUnits(int $x, int $y): array
    {
        // 1. looks up x and y in local data and gets a list of unit ids
        // 2. goes off to a data source and gets full unit data

        // here's some fake data
        $army = new Army();
        $army->addUnit(new Archer());
        $found = [
            new Cavalry(),
            null,
            new LaserCanonUnit(),
            $army
        ];

        return $found;
    }
}
