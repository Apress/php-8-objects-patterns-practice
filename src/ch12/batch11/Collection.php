<?php

declare(strict_types=1);

namespace popp\ch12\batch11;

class Collection
{
    private array $vals = [];

    public function add(Space $space): void
    {
        $this->vals[] = $space;
    }

    // dummy implementation
    public static function getCollection($type): SpaceCollection
    {
        return new SpaceCollection();
    }
}
