<?php

declare(strict_types=1);

namespace popp\ch09\batch07;

abstract class ApptEncoder
{
    abstract public function encode(): string;
}
