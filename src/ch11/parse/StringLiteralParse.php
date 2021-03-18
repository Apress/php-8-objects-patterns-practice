<?php

declare(strict_types=1);

namespace popp\ch11\parse;

class StringLiteralParse extends Parser
{

    public function trigger(Scanner $scanner): bool
    {
        return ( $scanner->tokenType() == Scanner::APOS ||
                 $scanner->tokenType() == Scanner::QUOTE );
    }

    public function push(Scanner $scanner)
    {
        return;
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
            $scanner->pushResult($string);
        }

        return $ret;
    }
}
