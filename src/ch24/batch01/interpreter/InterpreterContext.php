<?php

declare(strict_types=1);

namespace popp\ch24\batch01\interpreter;

class InterpreterContext
{
    private array $expressionstore = [];

    public function replace(Expression $exp, $value): void
    {
        $this->expressionstore[$exp->getKey()] = $value;
    }

    public function lookup(Expression $exp): mixed
    {
        return $this->expressionstore[$exp->getKey()];
    }
}
