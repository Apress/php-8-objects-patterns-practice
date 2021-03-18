<?php

declare(strict_types=1);

namespace popp\ch13\batch01;

class SpaceCollection extends Collection
{
    public function targetClass(): string
    {
        return Space::class;
    }
}
