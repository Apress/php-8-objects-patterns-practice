<?php

declare(strict_types=1);

namespace popp\ch13\batch07;

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

    public function getCollection(array $array): EventCollection
    {
        return new EventCollection($array, $this->getDomainObjectFactory());
    }

    public function getSelectionFactory(): SelectionFactory
    {
        return new EventSelectionFactory();
    }

    public function getUpdateFactory(): EventUpdateFactory
    {
        return new EventUpdateFactory();
    }

    public function getIdentityObject(): EventIdentityObject
    {
        return new EventIdentityObject();
    }
}
