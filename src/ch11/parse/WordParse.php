<?php

declare(strict_types=1);

namespace popp\ch11\parse;

class WordParse extends Parser
{
    public function __construct($word = null, $name = null)
    {
        parent::__construct($name);
        $this->word = $word;
    }

    public function trigger(Scanner $scanner): bool
    {
        if ($scanner->tokenType() != Scanner::WORD) {
            return false;
        }
        if (is_null($this->word)) {
            return true;
        }
        return ( $this->word == $scanner->token() );
    }

    protected function doScan(Scanner $scanner): bool
    {
        $ret = ( $this->trigger($scanner) );
        return $ret;
    }
}
