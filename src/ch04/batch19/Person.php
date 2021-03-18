<?php

declare(strict_types=1);

namespace popp\ch04\batch19;

/* listing 04.94 */
class Person
{
    private int $id;

    public function __construct(protected string $name, private int $age)
    {
        $this->name = $name;
        $this->age  = $age;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function __destruct()
    {
        if (! empty($this->id)) {
            // save Person data
            print "saving person\n";
        }
    }
}
