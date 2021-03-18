<?php

declare(strict_types=1);

namespace popp\ch11\parse;

interface Handler
{
    public function handleMatch(Parser $parser, Scanner $scanner);
}
