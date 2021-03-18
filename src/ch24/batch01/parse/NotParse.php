<?php

declare(strict_types=1);

namespace popp\ch24\batch01\parse;

class NotParse extends CollectionParse
{

    public function trigger(Scanner $scanner): bool
    {
        return true;
    }

    protected function push(Scanner $scanner): void
    {
        return;
    }

    protected function doScan(Scanner $scanner): bool
    {
        $string = "";

        if (empty($this->parsers)) {
            return true;
        }

        $parser = $this->parsers[0];
        $start_state = $scanner->getState();

        while (! $parser->trigger($scanner) || ! $parser->scan($scanner)) {
            $string .= $scanner->token();
            $scanner->nextToken();

            if ($scanner->tokenType() == Scanner::EOF) {
                break;
            }
        }

        if ($string && ! $this->discard) {
            $scanner->getContext()->pushResult($string);
        }

        return (! empty($string));
    }
}
