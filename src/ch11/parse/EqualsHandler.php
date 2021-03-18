<?php

declare(strict_types=1);

namespace popp\ch11\parse;

class EqualsHandler implements Handler
{
    public function handleMatch(Parser $parser, Scanner $scanner)
    {
        $comp1 = $scanner->popResult();
        $comp2 = $scanner->popResult();
        $scanner->pushResult(new BooleanEqualsExpression($comp1, $comp2));
    }
}
