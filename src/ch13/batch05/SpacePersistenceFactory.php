<?php

declare(strict_types=1);

namespace popp\ch13\batch05;

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

    public function getCollection(array $row): SpaceCollection
    {
        return new SpaceCollection($row, $this->getDomainObjectFactory());
    }
}
