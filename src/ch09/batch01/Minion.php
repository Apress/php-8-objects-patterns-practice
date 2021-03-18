<?php

declare(strict_types=1);

namespace popp\ch09\batch01;

/* listing 09.02 */
class Minion extends Employee
{
    public function fire(): void
    {
        print "{$this->name}: I'll clear my desk\n";
    }
}
