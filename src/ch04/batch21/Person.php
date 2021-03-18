<?php

declare(strict_types=1);

namespace popp\ch04\batch21;

/* listing 04.102 */
class Person
{
    private int $id;

    public function __construct(private string $name, private int $age, public Account $account)
    {
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function __clone(): void
    {
        $this->id = 0;
    }
}
