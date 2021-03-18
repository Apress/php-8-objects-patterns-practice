<?php

declare(strict_types=1);

namespace popp\ch24\batch01;

abstract class Marker
{
    protected string $test;

    public function __construct(string $test)
    {
        $this->test = $test;
    }

    abstract public function mark(string $response): bool;
}
