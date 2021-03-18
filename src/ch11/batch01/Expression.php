<?php

declare(strict_types=1);

namespace popp\ch11\batch01;

/* listing 11.02 */
abstract class Expression
{
    private static int $keycount = 0;
    private string $key;

    abstract public function interpret(InterpreterContext $context);

    public function getKey(): string
    {
        if (! isset($this->key)) {
            self::$keycount++;
            $this->key = (string)self::$keycount;
        }
        return $this->key;
    }
}
