<?php

declare(strict_types=1);

namespace popp\ch24\batch01\parse;

/* listing 24.15 */

// this terminal parser matches a word token

class WordParse extends Parser
{
    public function __construct(private $word = null, $name = null, $options = [])
    {
        parent::__construct($name, $options);
    }

    public function trigger(Scanner $scanner): bool
    {
        if ($scanner->tokenType() != Scanner::WORD) {
            return false;
        }

        if (is_null($this->word)) {
            return true;
        }

        return ($this->word == $scanner->token());
    }

    protected function doScan(Scanner $scanner): bool
    {
        return ($this->trigger($scanner));
    }
}
