<?php

declare(strict_types=1);

namespace popp\ch09\batch08;

/* listing 09.24 */
abstract class CommsManager
{
    abstract public function getHeaderText(): string;
    abstract public function getApptEncoder(): ApptEncoder;
    abstract public function getFooterText(): string;
}
