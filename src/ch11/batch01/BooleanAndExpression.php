<?php

declare(strict_types=1);

namespace popp\ch11\batch01;

/* listing 11.11 */
class BooleanAndExpression extends OperatorExpression
{
    protected function doInterpret(
        InterpreterContext $context,
        mixed $result_l,
        mixed $result_r
    ): void {
        $context->replace($this, $result_l && $result_r);
    }
}
