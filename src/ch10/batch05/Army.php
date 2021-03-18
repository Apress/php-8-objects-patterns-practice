<?php

declare(strict_types=1);

namespace popp\ch10\batch05;

class Army extends CompositeUnit
{

    public function bombardStrength(): int
    {
        $ret = 0;
        foreach ($this->getUnits() as $unit) {
            $ret += $unit->bombardStrength();
        }
        return $ret;
    }
}
