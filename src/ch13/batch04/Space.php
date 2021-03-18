<?php

declare(strict_types=1);

namespace popp\ch13\batch04;

class Space extends DomainObject
{
    private ?EventCollection $events = null;

    public function __construct(int $id, private string $name, private ?Venue $venue = null)
    {
        $this->name = $name;
        parent::__construct($id);
        $this->venue = $venue;
    }

/* listing 13.27 */

    // Space

    public function setVenue(Venue $venue): void
    {
        $this->venue = $venue;
        $this->markDirty();
    }

    public function setName(string $name): void
    {
        $this->name = $name;
        $this->markDirty();
    }
/* /listing 13.27 */

    public function setEvents(EventCollection $collection): void
    {
        $this->events = $collection;
    }

    public function getEvents(): EventCollection
    {
        return $this->events;
    }

/* listing 13.30 */

    // Space

    public function getEvents2(): EventCollection
    {
        if (is_null($this->events)) {
            $reg = Registry::instance();
            $eventmapper = $reg->getEventMapper();
            $this->events = $eventmapper->findBySpaceId($this->getId());
        }

        return $this->events;
    }
/* /listing 13.30 */

    public function forgetEvents(): void
    {
        $this->events = null;
    }

    public function getVenue(): Venue
    {
        return $this->venue;
    }

    public function getFinder(): SpaceMapper
    {
        $reg = Registry::instance();
        return $reg->getSpaceMapper();
    }

    public function getName(): string
    {
        return $this->name;
    }
}
