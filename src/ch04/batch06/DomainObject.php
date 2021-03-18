<?php

declare(strict_types=1);

namespace popp\ch04\batch06;

/* listing 04.52 */
abstract class DomainObject
{
    public static function create(): DomainObject
    {
        return new self();
    }
}
