<?php

declare(strict_types=1);

namespace popp\ch11\batch10;

/* listing 11.55 */
class TileForces
{
    private int $x;
    private int $y;
    private array $units = [];

    public function __construct(int $x, int $y, UnitAcquisition $acq)
    {
        $this->x = $x;
        $this->y = $x;
        $this->units = $acq->getUnits($this->x, $this->y);
    }

    // ...
/* /listing 11.55 */
/* listing 11.57 */

    // TileForces

    public function firepower(): int
    {
        $power = 0;

        foreach ($this->units as $unit) {
            $power += $unit->bombardStrength();
        }

        return $power;
    }
/* /listing 11.57 */

    public function health(): int
    {
        $health = 0;

        foreach ($this->units as $unit) {
            $health += $unit->getHealth();
        }

        return $health;
    }
/* listing 11.55 */
}
/* /listing 11.55 */
