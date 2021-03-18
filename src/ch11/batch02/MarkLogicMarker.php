<?php

declare(strict_types=1);

namespace popp\ch11\batch02;

use popp\ch11\parse\MarkParse;

/* listing 11.18 */
class MarkLogicMarker extends Marker
{
    private MarkParse $engine;

    public function __construct(string $test)
    {
        parent::__construct($test);
        $this->engine = new MarkParse($test);
    }

    public function mark(string $response): bool
    {
        return $this->engine->evaluate($response);
    }
}
