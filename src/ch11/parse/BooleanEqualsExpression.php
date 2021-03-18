<?php

declare(strict_types=1);

namespace popp\ch11\parse;

class BooleanEqualsExpression extends OperatorExpression
{
    protected function doInterpret(
        Context $context,
        $result_l,
        $result_r
    ) {
            $context->replace($this, $result_l == $result_r);
    }
}
