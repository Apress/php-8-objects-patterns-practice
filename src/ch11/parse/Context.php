<?php

declare(strict_types=1);

namespace popp\ch11\parse;

class Context
{
    private array $expressionstore = [];
    public function replace(Expression $exp, $value)
    {
        $this->expressionstore[$exp->getKey()] = $value;
    }

    public function lookup(Expression $exp)
    {
        return $this->expressionstore[$exp->getKey()];
    }
}
