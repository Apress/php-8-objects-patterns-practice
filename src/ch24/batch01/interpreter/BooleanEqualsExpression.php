<?php

declare(strict_types=1);

namespace popp\ch24\batch01\interpreter;

class BooleanEqualsExpression extends OperatorExpression
{
    protected function doInterpret(
        InterpreterContext $context,
        mixed $result_l,
        mixed $result_r
    ): void {
            $context->replace($this, $result_l == $result_r);
    }
}
