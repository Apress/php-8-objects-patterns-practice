<?php

declare(strict_types=1);

namespace popp\ch13\batch05;

class VenuePersistenceFactory extends PersistenceFactory
{
    public function getMapper(): VenueMapper
    {
        return new VenueMapper();
    }

    public function getDomainObjectFactory(): VenueObjectFactory
    {
        return new VenueObjectFactory();
    }

    public function getCollection(array $row): VenueCollection
    {
        return new VenueCollection($row, $this->getDomainObjectFactory());
    }
}
