<?php

declare(strict_types=1);

namespace popp\ch18\batch04\woo\domain;

interface SpaceFinder extends Finder
{
    public function findByVenue($id);
}
