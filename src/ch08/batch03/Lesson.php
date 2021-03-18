<?php

declare(strict_types=1);

namespace popp\ch08\batch03;

use popp\ch08\batch02\Lecture;
use popp\ch08\batch02\Seminar;
use popp\ch08\batch02\CostStrategy;
use popp\ch08\batch02\FixedCostStrategy;
use popp\ch08\batch02\TimedCostStrategy;

abstract class Lesson
{

/* listing 08.18 */
    public function __construct(private int $duration, private FixedCostStrategy $costStrategy)
    {
    }
/* /listing 08.18 */

    public function cost(): int
    {
        return $this->costStrategy->cost($this);
    }

    public function chargeType(): string
    {
        return $this->costStrategy->chargeType();
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    // more lesson methods...
}
