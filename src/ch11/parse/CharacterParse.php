<?php

declare(strict_types=1);

namespace popp\ch11\parse;

class CharacterParse extends Parser
{
    private $char;

    public function __construct($char, $name = null)
    {
        parent::__construct($name);
        $this->char = $char;
    }

    public function trigger(Scanner $scanner): bool
    {
        return ( $scanner->token() == $this->char );
    }

    protected function doScan(Scanner $scanner): bool
    {
        return ( $this->trigger($scanner) );
    }
}
