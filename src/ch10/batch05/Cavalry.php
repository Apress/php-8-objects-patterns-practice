<?php

declare(strict_types=1);

namespace popp\ch10\batch05;

class Cavalry extends Unit
{
    public function bombardStrength(): int
    {
        return 3;
    }
}
