<?php

declare(strict_types=1);

namespace popp\ch13\batch07;

/* listing 13.42 */
class EventIdentityObject extends IdentityObject
{
    public function __construct(string $field = null)
    {
        parent::__construct(
            $field,
            ['name', 'id', 'start', 'duration', 'space']
        );
    }
}
