<?php

declare(strict_types=1);

namespace popp\ch24\batch01;

abstract class Question
{
    protected string $prompt;
    protected Marker $marker;

    public function __construct(string $prompt, Marker $marker)
    {
        $this->prompt = $prompt;
        $this->marker = $marker;
    }

    public function mark(string $response): bool
    {
        return $this->marker->mark($response);
    }
}
