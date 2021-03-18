<?php

namespace popp\ch18\batch04\woo\domain;

class Space extends DomainObject
{
    private $name;
    private $events;
    private $venue;

    public function __construct($id = null, $name = 'main')
    {
        parent::__construct($id);
        //$this->events = self::getCollection("woo\\domain\\Event");
        $this->events = null;
        $this->name = $name;
    }

    public function setEvents(EventCollection $events)
    {
        $this->events = $events;
    }

    public function getEvents()
    {
        if (is_null($this->events)) {
            $this->events = self::getFinder('woo\\domain\\Event')
                ->findBySpaceId($this->getId());
        }

        return $this->events;
    }

    public function addEvent(Event $event)
    {
        $this->events->add($event);
        $event->setSpace($this);
    }

    public function setName($name_s)
    {
        $this->name = $name_s;
        $this->markDirty();
    }

    public function setVenue(Venue $venue)
    {
        $this->venue = $venue;
        $this->markDirty();
    }

    public function getVenue()
    {
        return $this->venue;
    }

    public function getName()
    {
        return $this->name;
    }
}
