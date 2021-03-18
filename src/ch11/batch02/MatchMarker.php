<?php

declare(strict_types=1);

namespace popp\ch11\batch02;

/* listing 11.19 */
class MatchMarker extends Marker
{
    public function mark(string $response): bool
    {
        return ($this->test == $response);
    }
}
