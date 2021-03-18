<?php

declare(strict_types=1);

namespace popp\ch04\batch23;

/* listing 04.110 */
class Product
{
    public function __construct(public string $name, public float $price)
    {
    }
}
