<?php

declare(strict_types=1);

namespace popp\ch04\batch22;

/* listing 04.107 */
class Person
{
    public function getName(): string
    {
        return "Bob";
    }

    public function getAge(): int
    {
        return 44;
    }

    public function __toString(): string
    {
        $desc  = $this->getName() . " (age ";
        $desc .= $this->getAge() . ")";
        return $desc;
    }
}
