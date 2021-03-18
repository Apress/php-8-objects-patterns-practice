<?php

declare(strict_types=1);

namespace popp\ch09\batch06;

/* listing 09.15 */
abstract class ApptEncoder
{
    abstract public function encode(): string;
}
