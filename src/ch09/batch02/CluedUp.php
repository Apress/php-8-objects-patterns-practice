<?php

declare(strict_types=1);

namespace popp\ch09\batch02;

/* listing 09.06 */
class CluedUp extends Employee
{
    public function fire(): void
    {
        print "{$this->name}: I'll call my lawyer\n";
    }
}
