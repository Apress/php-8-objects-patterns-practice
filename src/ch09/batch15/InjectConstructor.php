<?php

declare(strict_types=1);

namespace popp\ch09\batch15;

/* listing 09.64 */
use Attribute;

#[Attribute]

public class InjectConstructor
{
    public function __construct()
    {
    }
}
