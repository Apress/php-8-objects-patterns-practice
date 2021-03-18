<?php

declare(strict_types=1);

namespace popp\ch09\batch03;

/* listing 09.09 */
class WellConnected extends Employee
{
    public function fire(): void
    {
        print "{$this->name}: I'll call my dad\n";
    }
}
