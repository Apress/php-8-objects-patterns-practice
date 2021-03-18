<?php

declare(strict_types=1);

namespace popp\ch10\batch01;

/* listing 10.01 */
abstract class Unit
{
    abstract public function bombardStrength(): int;
}
