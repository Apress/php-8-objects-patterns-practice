<?php

declare(strict_types=1);

namespace popp\ch09\batch10;

/* listing 09.30 */
abstract class CommsManager
{
    public const APPT    = 1;
    public const TTD     = 2;
    public const CONTACT = 3;
    abstract public function getHeaderText(): string;
    abstract public function make(int $flag_int): Encoder;
    abstract public function getFooterText(): string;
}
