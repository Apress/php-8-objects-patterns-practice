<?php

declare(strict_types=1);

namespace popp\ch13\batch04;

class SpaceCollection extends Collection
{
    public function targetClass(): string
    {
        return Space::class;
    }
}
