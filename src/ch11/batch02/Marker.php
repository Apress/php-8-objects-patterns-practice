<?php

declare(strict_types=1);

namespace popp\ch11\batch02;

/* listing 11.17 */
abstract class Marker
{
    public function __construct(protected string $test)
    {
    }

    abstract public function mark(string $response): bool;
}
