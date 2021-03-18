<?php

declare(strict_types=1);

namespace popp\ch13\batch04;

class Event extends DomainObject
{

    public function __construct(int $id, private string $name, private int $start, private int $duration, private Space $space)
    {
        parent::__construct($id);
    }

    public function setStart(int $start): void
    {
        $this->start = $start;
        $this->markDirty();
    }

    public function getStart(): int
    {
        return $this->start;
    }

    public function setSpace(Space $space): void
    {
        $this->space = $space;
        $this->markDirty();
    }

    public function getSpace(): Space
    {
        return $this->space;
    }

    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
        $this->markDirty();
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function setName(string $name): void
    {
        $this->name = $name_s;
        $this->markDirty();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFinder(): EventMapper
    {
        $reg = Registry::instance();

        return $reg->getEventMapper();
    }
}
