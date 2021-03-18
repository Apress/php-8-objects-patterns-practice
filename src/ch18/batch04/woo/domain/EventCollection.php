<?php

declare(strict_types=1);

namespace popp\ch18\batch04\woo\domain;

interface EventCollection extends \Iterator
{
    public function add(DomainObject $event);
}
