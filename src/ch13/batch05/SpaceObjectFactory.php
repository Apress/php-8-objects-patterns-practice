<?php

declare(strict_types=1);

namespace popp\ch13\batch05;

class SpaceObjectFactory extends DomainObjectFactory
{
    public function createObject(array $array): Space
    {
        $old = $this->getFromMap(Space::class, $array['id']);

        if (! is_null($old)) {
            return $old;
        }

        $obj = new Space($array['id'], $array['name']);
        $ven_mapper = new VenueMapper();
        $venue = $ven_mapper->find($array['venue']);
        $obj->setVenue($venue);

        $event_mapper = new EventMapper();
        $event_collection = $event_mapper->findBySpaceId($array['id']);
        $obj->setEvents($event_collection);

        return $obj;
    }
}
