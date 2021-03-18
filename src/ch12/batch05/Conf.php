<?php

declare(strict_types=1);

namespace popp\ch12\batch05;

class Conf
{
    public function __construct(private array $vals = [])
    {
    }

    public function get(string $key): mixed
    {
        if (isset($this->vals[$key])) {
            return $this->vals[$key];
        }

        return null;
    }

    public function set(string $key, $val): void
    {
        $this->vals[$key] = $val;
    }
}
