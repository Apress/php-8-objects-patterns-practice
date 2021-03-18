<?php

declare(strict_types=1);

namespace popp\ch11\parse;

abstract class CollectionParse extends Parser
{
    protected $parsers = [];

    public function add(Parser $p): Parser
    {
        if (is_null($p)) {
            throw new Exception("argument is null");
        }
        $this->parsers[] = $p;
        return $p;
    }

    public function term(): bool
    {
        return false;
    }
}
