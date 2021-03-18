<?php
declare(strict_types=1);

namespace popp\ch13\batch04;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch04Test extends BaseUnit 
{

    public function testRunner()
    {
        $names = Runner::run();
        // demonstratest that objects update
        $expecting = ["The Likey Lounge", "The Bibble Beer Likey Lounge"];
        self::assertEquals($expecting, $names);

        $val = $this->capture(function() { Runner::run2(); });
        $expecting = "inserting The Green Trees\ninserting The Space Upstairs\ninserting The Bar Stage\n";
        self::assertEquals($expecting, $val);
        
        $val = $this->capture(function() { Runner::run3(); });
        $expecting = "    happy happy time\n    cry sad shouty time\n";
        self::assertEquals($expecting, $val);
    }

    public function testSpaceGetEvents2() {
        Runner::setup();
        $vmapper = new VenueMapper();

        $venue1 = new Venue(-1, "Badger Fancy Gulp Emporium");
        $vmapper->insert($venue1);

        $space1 = new Space(-1, "Tree Badger Foot Worship", $venue1);
        $smapper = new SpaceMapper();
        $smapper->insert($space1);
        $spaceid = $space1->getId();

        $names = [
            "kiss the badger's paw",
            "praise the badger's paw",
            "eat the badger's paw"
        ];

        $now = new \DateTime("now");
        $nowsecs = $now->getTimestamp();
        $event1 = new Event(-1, $names[0], $nowsecs, 60, $space1);
        $event2 = new Event(-1, $names[1], $nowsecs, 60, $space1);
        $event3 = new Event(-1, $names[2], $nowsecs, 60, $space1);

        $emapper = new EventMapper();
        $emapper->insert($event1);
        $emapper->insert($event2);
        $emapper->insert($event3);

        // kill caching
        ObjectWatcher::reset();

        $mapper = new SpaceMapper();
        $space = $mapper->find((int)$spaceid);
        $space->forgetEvents();
        $events = $space->getEvents2();

        // now get a venue object and check we've won its spaces
        foreach ($events as $event) {
            self::assertTrue(in_array($event->getName(), $names));
            //print "    " . $event->getName() . "\n";
        }
    }
}
