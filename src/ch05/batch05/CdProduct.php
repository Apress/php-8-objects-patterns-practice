<?php

declare(strict_types=1);

namespace popp\ch05\batch05;

class CdProduct
{
    public string $coverUrl = "cover url";

    public function getTitle(): string
    {
        return "fake title";
    }
}
