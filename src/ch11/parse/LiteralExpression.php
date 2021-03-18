<?php

declare(strict_types=1);

namespace popp\ch11\parse;

class LiteralExpression extends Expression
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function interpret(Context $context)
    {
        $context->replace($this, $this->value);
    }
}
