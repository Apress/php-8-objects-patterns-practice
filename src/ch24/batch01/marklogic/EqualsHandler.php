<?php

declare(strict_types=1);

namespace popp\ch24\batch01\marklogic;

use popp\ch24\batch01\parse\Handler;
use popp\ch24\batch01\parse\Parser;
use popp\ch24\batch01\parse\Scanner;
use popp\ch24\batch01\interpreter\BooleanEqualsExpression;

/* listing 24.22 */
class EqualsHandler implements Handler
{
    public function handleMatch(Parser $parser, Scanner $scanner): void
    {
        $comp1 = $scanner->getContext()->popResult();
        $comp2 = $scanner->getContext()->popResult();
        $scanner->getContext()->pushResult(new BooleanEqualsExpression($comp1, $comp2));
    }
}
