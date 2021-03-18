<?php

declare(strict_types=1);

namespace popp\ch09\batch03;

class CluedUp extends Employee
{
    public function fire(): void
    {
        print "{$this->name}: I'll call my lawyer\n";
    }
}
