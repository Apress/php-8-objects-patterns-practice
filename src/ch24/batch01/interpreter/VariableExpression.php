<?php

declare(strict_types=1);

namespace popp\ch24\batch01\interpreter;

class VariableExpression extends Expression
{
    private string $name;
    private mixed $val;

    public function __construct(string $name, mixed $val = null)
    {
        $this->name = $name;
        $this->val = $val;
    }

    public function interpret(InterpreterContext $context): void
    {
        if (! is_null($this->val)) {
            $context->replace($this, $this->val);
            $this->val = null;
        }
    }

    public function setValue($value): void
    {
        $this->val = $value;
    }

    public function getKey(): string
    {
        return $this->name;
    }
}
