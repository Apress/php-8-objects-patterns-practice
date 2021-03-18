<?php

declare(strict_types=1);

namespace popp\ch09\batch15;

/* listing 09.69 */
use Attribute;

#[Attribute]

class Inject
{
    public function __construct()
    {
    }
}
