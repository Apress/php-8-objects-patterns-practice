<?php

declare(strict_types=1);

namespace popp\ch11\batch02;

/* listing 11.20 */
class RegexpMarker extends Marker
{
    public function mark(string $response): bool
    {
        return (preg_match("$this->test", $response) === 1);
    }
}
