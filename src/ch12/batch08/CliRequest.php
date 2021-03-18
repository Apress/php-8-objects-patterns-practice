<?php

declare(strict_types=1);

namespace popp\ch12\batch08;

use popp\ch12\batch06\CliRequest as CliRequest06;
use popp\ch12\batch06\Registry;

class CliRequest extends CliRequest06
{
    public function forward(string $path): void
    {
        // tack the new path onto the end the argument list
        // last argument wins
        $_SERVER['argv'][] = "path:{$path}";
        Registry::reset();
        include($path);
    }
}
