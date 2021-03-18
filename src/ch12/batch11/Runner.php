<?php

declare(strict_types=1);

namespace popp\ch12\batch11;

class Runner
{
    public static function run()
    {
        // runner code here
        $venue = new Venue(-1, "bob's house");
        $venue->addSpace(new Space(-1, "the big stage"));
        $spaces = $venue->getSpaces();
        $venue->setSpaces($spaces);
        return $venue;
    }
}
