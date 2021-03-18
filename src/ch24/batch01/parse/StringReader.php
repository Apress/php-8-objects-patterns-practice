<?php

declare(strict_types=1);

namespace popp\ch24\batch01\parse;

/* listing 24.05 */
class StringReader implements Reader
{
    private int $pos;
    private int $len;

    public function __construct(private string $in)
    {
        $this->pos = 0;
        $this->len = strlen($in);
    }

    public function getChar(): string|bool
    {
        if ($this->pos >= $this->len) {
            return false;
        }

        $char = substr($this->in, $this->pos, 1);
        $this->pos++;

        return $char;
    }

    public function getPos(): int
    {
        return $this->pos;
    }

    public function pushBackChar(): void
    {
        $this->pos--;
    }

    public function string(): string
    {
        return $this->in;
    }
}
