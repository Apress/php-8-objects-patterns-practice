<?php

namespace popp\ch12\batch07;

class Venue
{
    public function __construct(private string $name)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }
}
