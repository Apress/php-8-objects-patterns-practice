<?php

declare(strict_types=1);

namespace popp\ch09\batch01;

/* listing 09.01 */
abstract class Employee
{

    public function __construct(protected string $name)
    {
    }

    abstract public function fire(): void;
}
