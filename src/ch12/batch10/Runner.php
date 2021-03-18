<?php

declare(strict_types=1);

namespace popp\ch12\batch10;

class Runner
{
    public static function run()
    {
        $table = new TableCreator();
        $table->createTables();

        $halfhour = (60 * 30);
        $hour     = (60 * 60);
        $day      = (24 * $hour);

        $mgr = new VenueManager();
        $ret = $mgr->addVenue(
            "The Eyeball Inn",
            ['The Room Upstairs', 'Main Bar']
        );

        $space_id = $ret['spaces'][0][0];

        $mgr->bookEvent((int) $space_id, "Running like the rain", time() + ($day), ($hour - 5));
        $mgr->bookEvent((int) $space_id, "Running like the trees", time() + ($day - $hour), $hour);
    }
}
