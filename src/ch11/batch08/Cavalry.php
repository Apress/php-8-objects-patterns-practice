<?php

declare(strict_types=1);

namespace popp\ch11\batch08;

class Cavalry extends Unit
{
    public function bombardStrength(): int
    {
        return 2;
    }
}
