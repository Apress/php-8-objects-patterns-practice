<?php

declare(strict_types=1);

namespace popp\ch04\batch05;

/* listing 04.15 */
interface Chargeable
{
    public function getPrice(): float;
}
