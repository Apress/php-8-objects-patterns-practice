<?php

declare(strict_types=1);

namespace popp\ch11\batch07;

/* listing 11.37 */
class Army extends CompositeUnit
{
    public function bombardStrength(): int
    {
        $strength = 0;

        foreach ($this->units() as $unit) {
            $strength += $unit->bombardStrength();
        }

        return $strength;
    }
}
