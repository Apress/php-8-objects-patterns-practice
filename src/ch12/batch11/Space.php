<?php

declare(strict_types=1);

namespace popp\ch12\batch11;

class Space extends DomainObject
{
    private Venue $venue;

    public function __construct(int $id, private string $name)
    {
        parent::__construct($id);
    }

    public function setVenue(Venue $venue): void
    {
        $this->venue = $venue;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
        $this->markDirty();
    }

    public function getName(): string
    {
        return $this->name;
    }
}
