<?php

declare(strict_types=1);

namespace popp\ch24\batch01\parse;

/* listing 24.02 */
class ScannerState
{
    public int $line_no;
    public int $char_no;
    public ?string $token;
    public int $token_type;
    public Context $context;
    public Reader $r;
}
