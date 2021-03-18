<?php

declare(strict_types=1);

namespace popp\ch13\batch07;

class SpacePersistenceFactory extends PersistenceFactory
{
    public function getMapper(): Mapper
    {
        return new SpaceMapper();
    }

    public function getDomainObjectFactory(): SpaceObjectFactory
    {
        return new SpaceObjectFactory();
    }

    public function getCollection(array $array): SpaceCollection
    {
        return new SpaceCollection($array, $this->getDomainObjectFactory());
    }

    public function getSelectionFactory(): SpaceSelectionFactor
    {
        return new SpaceSelectionFactory();
    }

    public function getUpdateFactory(): SpaceUpdateFactory
    {
        return new SpaceUpdateFactory();
    }

    public function getIdentityObject(): SpaceIdentityObject
    {
        return new SpaceIdentityObject();
    }
}
