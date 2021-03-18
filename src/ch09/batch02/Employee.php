<?php

declare(strict_types=1);

namespace popp\ch09\batch02;

abstract class Employee
{
    public function __construct(protected string $name)
    {
    }
    abstract public function fire(): void;
}
