<?php

namespace popp\ch03\batch10;

/* listing 03.71 */
class Point
{
    private $x = 0;
    private $y = 0;

    public function setVals(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }
}
/* /listing 03.71 */
