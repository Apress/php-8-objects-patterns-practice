<?php

declare(strict_types=1);

namespace popp\ch08\batch02;

/* listing 08.11 */
class FixedCostStrategy extends CostStrategy
{
    public function cost(Lesson $lesson): int
    {
        return 30;
    }

    public function chargeType(): string
    {
        return "fixed rate";
    }
}
/* /listing 08.11 */
