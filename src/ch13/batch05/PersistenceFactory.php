<?php

declare(strict_types=1);

namespace popp\ch13\batch05;

use popp\ch13\batch04\Venue;
use popp\ch12\batch06\AppException;

abstract class PersistenceFactory
{

    abstract public function getMapper(): Mapper;
    abstract public function getDomainObjectFactory(): DomainObjectFactory;
    abstract public function getCollection(array $raw): Collection;

    public static function getFactory($targetclass): PersistenceFactory
    {
        switch ($targetclass) {
            case Venue::class:
                return new VenuePersistenceFactory();
                break;
            case Event::class:
                return new EventPersistenceFactory();
                break;
            case Space::class:
                return new SpacePersistenceFactory();
                break;
            default:
                throw new AppException("Unknown class {$targetclass}");
                break;
        }
    }
}
