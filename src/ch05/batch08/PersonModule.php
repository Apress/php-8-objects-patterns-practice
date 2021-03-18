<?php

declare(strict_types=1);

namespace popp\ch05\batch08;

/* listing 05.79 */
class PersonModule implements Module
{
    public function setPerson(Person $person): void
    {
        print "PersonModule::setPerson(): {$person->name}\n";
    }

    public function execute(): void
    {
        // do things
    }
}
