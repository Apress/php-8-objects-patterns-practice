<?php

declare(strict_types=1);

namespace popp\ch13\batch05;

use popp\ch13\batch04\ObjectWatcher;
use popp\ch13\batch04\DomainObject;

/* listing 13.33 */
abstract class DomainObjectFactory
{
    abstract public function createObject(array $row): DomainObject;

/* /listing 13.33 */
    protected function getFromMap($class, $id): ?DomainObject
    {
        return ObjectWatcher::exists($class, $id);
    }

    protected function addToMap(DomainObject $obj): DomainObject
    {
        return ObjectWatcher::add($obj);
    }
/* listing 13.33 */
}
/* /listing 13.33 */
