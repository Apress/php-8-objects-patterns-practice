<?php

declare(strict_types=1);

namespace popp\ch24\batch01\marklogic;

use popp\ch24\batch01\parse\Handler;
use popp\ch24\batch01\parse\Parser;
use popp\ch24\batch01\parse\Scanner;
use popp\ch24\batch01\interpreter\VariableExpression;

/* listing 24.20 */
class VariableHandler implements Handler
{
    public function handleMatch(Parser $parser, Scanner $scanner): void
    {
        $varname = $scanner->getContext()->popResult();
        $scanner->getContext()->pushResult(new VariableExpression($varname));
    }
}
