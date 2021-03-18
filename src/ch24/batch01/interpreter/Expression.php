<?php

declare(strict_types=1);

namespace popp\ch24\batch01\interpreter;

abstract class Expression
{
    private static int $keycount = 0;
    private string|int $key;

    abstract public function interpret(InterpreterContext $context): void;

    public function getKey(): string|int
    {
        if (! isset($this->key)) {
            self::$keycount++;
            $this->key = self::$keycount;
        }

        return $this->key;
    }
}
