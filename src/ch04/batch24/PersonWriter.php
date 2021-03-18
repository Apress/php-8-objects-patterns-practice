<?php

declare(strict_types=1);

namespace popp\ch04\batch24;

/* listing 04.123 */
interface PersonWriter
{
    public function write(Person $person): void;
}
