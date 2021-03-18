<?php

declare(strict_types=1);

namespace popp\ch13\batch07;

class VenueIdentityObject extends IdentityObject
{
    public function __construct(string $field = null)
    {
        parent::__construct($field, ['name', 'id']);
    }
}
