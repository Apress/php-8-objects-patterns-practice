<?php

declare(strict_types=1);

namespace popp\ch04\batch21;

class ShallowPerson
{
    private int $id;

    public function __construct(private string $name, private int $age, public Account $account)
    {
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

/* listing 04.104 */
    public function __clone(): void
    {
        $this->id = 0;
        $this->account = clone $this->account;
    }
/* /listing 04.104 */
}
