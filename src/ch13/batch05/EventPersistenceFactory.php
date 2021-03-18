<?php

declare(strict_types=1);

namespace popp\ch13\batch05;

class EventPersistenceFactory extends PersistenceFactory
{
    public function getMapper(): Mapper
    {
        return new EventMapper();
    }

    public function getDomainObjectFactory(): EventObjectFactory
    {
        return new EventObjectFactory();
    }

    public function getCollection(array $raw): EventCollection
    {
        return new EventCollection($raw, $this->getDomainObjectFactory());
    }
}
