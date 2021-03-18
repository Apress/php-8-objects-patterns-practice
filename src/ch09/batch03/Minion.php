<?php

declare(strict_types=1);

namespace popp\ch09\batch03;

class Minion extends Employee
{
    public function fire(): void
    {
        print "{$this->name}: I'll clear my desk\n";
    }
}
