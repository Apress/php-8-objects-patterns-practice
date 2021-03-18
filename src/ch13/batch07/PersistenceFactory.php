<?php

declare(strict_types=1);

namespace popp\ch13\batch07;

use popp\ch13\batch04\Venue;
use popp\ch13\batch05\DomainObjectFactory;
use popp\ch13\batch05\Collection;

abstract class PersistenceFactory
{

    abstract public function getMapper(): Mapper;
    abstract public function getDomainObjectFactory(): DomainObjectFactory;
    abstract public function getCollection(array $array): Collection;
    abstract public function getSelectionFactory(): SelectionFactory;
    abstract public function getUpdateFactory(): UpdateFactory;

    public static function getFactory($target_class): PersistenceFactory
    {
        switch ($target_class) {
            case Venue::class:
                return new VenuePersistenceFactory();
                break;
            case Event::class:
                return new EventPersistenceFactory();
                break;
            case Space::class:
                return new SpacePersistenceFactory();
                break;
        }
    }
}
