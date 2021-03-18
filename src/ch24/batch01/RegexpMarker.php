<?php

declare(strict_types=1);

namespace popp\ch24\batch01;

class RegexpMarker extends Marker
{
    public function mark(string $response): bool
    {
        $match = preg_match("{$this->test}", $response);
        return ( ! is_bool($match) && $match > 0 );
    }
}
