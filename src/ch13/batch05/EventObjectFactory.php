<?php

declare(strict_types=1);

namespace popp\ch13\batch05;

use popp\ch13\batch04\Event;

class EventObjectFactory extends DomainObjectFactory
{
    public function createObject(array $row): DomainObject
    {
        $class = Event::class;
        $old = $this->getFromMap(Event::class, $row['id']);

        //$obj->setstart($row['start']);
        //$obj->setduration($row['duration']);
        //$obj->setname($row['name']);
        $space_mapper = new SpaceMapper();
        $space = $space_mapper->find($row['space']);

        //$obj->setSpace($space);

        $obj = new Event(
            $row['id'],
            $row['name'],
            (int)$row['start'],
            (int)$row['duration'],
            $space
        );

        return $obj;
    }
}
