<?php

declare(strict_types=1);

namespace popp\ch24\batch01\marklogic;

use popp\ch24\batch01\parse\Handler;
use popp\ch24\batch01\parse\Parser;
use popp\ch24\batch01\parse\Scanner;
use popp\ch24\batch01\interpreter\LiteralExpression;

/* listing 24.21 */
class StringLiteralHandler implements Handler
{
    public function handleMatch(Parser $parser, Scanner $scanner): void
    {
        $value = $scanner->getContext()->popResult();
        $scanner->getContext()->pushResult(new LiteralExpression($value));
    }
}
