<?php

declare(strict_types=1);

namespace popp\ch10\batch05;

/* listing 10.13 */
abstract class Unit
{
    public function getComposite(): ?CompositeUnit
    {
        return null;
    }

    abstract public function bombardStrength(): int;
}
/* /listing 10.13 */
