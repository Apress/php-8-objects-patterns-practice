<?php

declare(strict_types=1);

namespace popp\ch11\parse;

class VariableHandler implements Handler
{
    public function handleMatch(Parser $parser, Scanner $scanner)
    {
        $varname = $scanner->popResult();
        $scanner->pushResult(new VariableExpression($varname));
    }
}
