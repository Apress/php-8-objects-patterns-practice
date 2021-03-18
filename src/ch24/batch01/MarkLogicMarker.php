<?php

declare(strict_types=1);

namespace popp\ch24\batch01;

use popp\ch24\batch01\marklogic\MarkParse;

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
