<?php

declare(strict_types=1);

namespace popp\ch10\batch04;

class Tank extends Unit
{

    public function bombardStrength(): int
    {
        return 4;
    }
}
