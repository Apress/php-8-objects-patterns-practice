<?php

declare(strict_types=1);

namespace popp\ch11\parse;

abstract class Expression
{
    private static $keycount = 0;
    private $key;
    abstract public function interpret(Context $context);

    public function getKey()
    {
        if (! isset($this->key)) {
            self::$keycount++;
            $this->key = self::$keycount;
        }
        return $this->key;
    }
}
