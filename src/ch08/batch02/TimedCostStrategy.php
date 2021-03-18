<?php

declare(strict_types=1);

namespace popp\ch08\batch02;

/* listing 08.10 */
class TimedCostStrategy extends CostStrategy
{
    public function cost(Lesson $lesson): int
    {
        return ($lesson->getDuration() * 5);
    }

    public function chargeType(): string
    {
        return "hourly rate";
    }
}
/* /listing 08.10 */
