<?php

declare(strict_types=1);

namespace popp\ch24\batch01\parse;

/* listing 24.14 */

// this terminal parser matches a string literal

class StringLiteralParse extends Parser
{
    public function trigger(Scanner $scanner): bool
    {
        return (
            $scanner->tokenType() == Scanner::APOS ||
            $scanner->tokenType() == Scanner::QUOTE
        );
    }

    protected function push(Scanner $scanner): void
    {
    }

    protected function doScan(Scanner $scanner): bool
    {
        $quotechar = $scanner->tokenType();
        $ret = false;
        $string = "";

        while ($token = $scanner->nextToken()) {
            if ($token == $quotechar) {
                $ret = true;
                break;
            }

            $string .= $scanner->token();
        }

        if ($string && ! $this->discard) {
            $scanner->getContext()->pushResult($string);
        }

        return $ret;
    }
}
