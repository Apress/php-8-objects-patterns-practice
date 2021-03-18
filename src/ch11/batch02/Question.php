<?php

declare(strict_types=1);

namespace popp\ch11\batch02;

/* listing 11.14 */
abstract class Question
{
    public function __construct(protected string $prompt, protected Marker $marker)
    {
    }

    public function mark(string $response): bool
    {
        return $this->marker->mark($response);
    }
}
