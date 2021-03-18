<?php

declare(strict_types=1);

namespace popp\ch13\batch01;

abstract class DomainObject
{
    public function __construct(private int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function markDirty(): void
    {
    }
}
