<?php

declare(strict_types=1);

namespace popp\ch11\batch01;

/* listing 11.03 */
class LiteralExpression extends Expression
{
    private mixed $value;

    public function __construct(mixed $value)
    {
        $this->value = $value;
    }

    public function interpret(InterpreterContext $context): void
    {
        $context->replace($this, $this->value);
    }
}
