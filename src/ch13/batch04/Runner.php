<?php

declare(strict_types=1);

namespace popp\ch13\batch04;

use popp\ch12\batch10\TableCreator;
use popp\ch12\batch06\Conf;

class Runner
{

    public static function run()
    {
        self::setUp();

        $mapper = new VenueMapper();

        $venue = new Venue(-1, "The Likey Lounge");
        $mapper->insert($venue);
        $venue = $mapper->find($venue->getId());
        $names[] = $venue->getName();
        $venue->setName("The Bibble Beer Likey Lounge");
        $mapper->update($venue);
        $venue = $mapper->find($venue->getId());
        $names[] = $venue->getName();

        return $names;
    }

    public static function run2()
    {
        self::setUp();
        ObjectWatcher::reset();

/* listing 13.28 */

        // a -1 id value represents a brand new Venue or Space
        $venue = new Venue(-1, "The Green Trees");

        $venue->addSpace(
            new Space(-1, 'The Space Upstairs')
        );
        $venue->addSpace(
            new Space(-1, 'The Bar Stage')
        );

        // this could be called from the controller or a helper class
        ObjectWatcher::instance()->performOperations();

/* /listing 13.28 */
    }


    public static function run3()
    {
        // set up conf

        // test SpaceMapper integrated with VenueMapper
        self::setUp();
        $vmapper = new VenueMapper();

        $venue1 = new Venue(-1, "The Likey Lounge");
        $vmapper->insert($venue1);
        $venue1id = $venue1->getId();

        $venue2 = new Venue(-1, "The Hatey Lounge");
        $vmapper->insert($venue2);

        $space1 = new Space(-1, "Stage Upstairs", $venue1);
        $space2 = new Space(-1, "The Basement", $venue1);
        $smapper = new SpaceMapper();
        $smapper->insert($space1);
        $smapper->insert($space2);
        $spaceid = $space1->getId();

        $now = new \DateTime("now");
        $nowsecs = $now->getTimestamp();
        $event1 = new Event(-1, "happy happy time", $nowsecs, 60, $space1);
        $event2 = new Event(-1, "cry sad shouty time", $nowsecs, 60, $space1);

        $emapper = new EventMapper();
        $emapper->insert($event1);
        $emapper->insert($event2);

        // now read back

        // kill caching
        ObjectWatcher::reset();

        $mapper = new SpaceMapper();
        $space = $mapper->find((int)$spaceid);
        $events = $space->getEvents();

        // now get a venue object and check we've won its spaces
        foreach ($events as $event) {
            print "    " . $event->getName() . "\n";
        }
    }

    public static function setUp()
    {
        $config = __DIR__ . "/../batch01/data/woo_options.ini";
        $options = parse_ini_file($config, true);
        Registry::reset();
        $reg = Registry::instance();
        $conf = new Conf($options['config']);
        $reg->setConf($conf);
        $reg = Registry::instance();
        $dsn = $reg->getDSN();

        if (is_null($dsn)) {
            throw new AppException("No DSN");
        }

        $pdo = new \PDO($dsn);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $autoincrement = "AUTOINCREMENT";

        $pdo->query("DROP TABLE IF EXISTS venue");
        $pdo->query("CREATE TABLE venue ( id INTEGER PRIMARY KEY
            $autoincrement, name TEXT )");
        $pdo->query("INSERT into venue ( name ) values ('bob')");
        $pdo->query("DROP TABLE  IF EXISTS space");
        $pdo->query("CREATE TABLE space ( id INTEGER PRIMARY KEY
            $autoincrement, venue INTEGER, name TEXT )");
        $pdo->query("DROP TABLE IF EXISTS event");
        $pdo->query("CREATE TABLE event ( id INTEGER PRIMARY KEY
            $autoincrement, space INTEGER, start long, duration int, name text )");
    }
}
