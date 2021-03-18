<?php

declare(strict_types=1);

/* listing 05.90 */
namespace popp\ch05\batch09;

use Attribute;

#[Attribute]

class ApiInfo
{
    public function __construct(public string $compinfo, public string $depinfo)
    {
    }
}
