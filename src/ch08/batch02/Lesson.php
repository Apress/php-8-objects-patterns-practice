<?php

declare(strict_types=1);

namespace popp\ch08\batch02;

/* listing 08.05 */
abstract class Lesson
{

/* listing 08.19 */
    public function __construct(private int $duration, private CostStrategy $costStrategy)
    {
    }
/* /listing 08.19 */

/* listing 08.08 */
    public function cost(): int
    {
        return $this->costStrategy->cost($this);
    }
/* /listing 08.08 */

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
/* /listing 08.05 */
