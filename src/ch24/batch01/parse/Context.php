<?php

declare(strict_types=1);

namespace popp\ch24\batch01\parse;

/* listing 24.03 */
class Context
{
    public array $resultstack = [];

    public function pushResult($mixed): void
    {
        array_push($this->resultstack, $mixed);
    }

    public function popResult(): mixed
    {
        return array_pop($this->resultstack);
    }

    public function resultCount(): int
    {
        return count($this->resultstack);
    }

    public function peekResult(): mixed
    {
        if (empty($this->resultstack)) {
            throw new Exception("empty resultstack");
        }

        return $this->resultstack[count($this->resultstack) - 1];
    }
/* /listing 24.03 */

/**
 * Get the stack as an array
 *
 * @return array mixed
    function resultArray() {
        return $this->resultstack;
    }
 */
/* listing 24.03 */
}
