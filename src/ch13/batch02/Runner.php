<?php

declare(strict_types=1);

namespace popp\ch13\batch02;

use popp\ch12\batch10\TableCreator;
use popp\ch12\batch06\Conf;
use popp\ch13\batch01\Registry;
use popp\ch13\batch01\Venue;
use popp\ch13\batch01\SpaceMapper;
use popp\ch13\batch01\Space;

class Runner
{


    public static function run()
    {
        $venue1id = self::forRun1and3();
        $mapper = new VenueMapper();
        $venue = $mapper->find($venue1id);

        // now get a venue object and check we've won its spaces
        $acquiredvenue1 = $mapper->find($venue1id);
        print $acquiredvenue1->getName() . "\n";
        $spaces = $acquiredvenue1->getSpaces();

        foreach ($spaces as $space) {
            print "    " . $space->getName() . "\n";
        }
    }

    public static function run3()
    {
        $venue1id = self::forRun1and3();
        $mapper = new VenueMapper();
        $venue = $mapper->find($venue1id);

        // now get a venue object and check we've won its spaces
        $acquiredvenue1 = $mapper->find($venue1id);
        print $acquiredvenue1->getName() . "\n";
        $spaces = $acquiredvenue1->getSpaces2();

        foreach ($spaces as $space) {
            print "    " . $space->getName() . "\n";
        }
    }

    private static function forRun1and3()
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

        return $venue1id;
    }

    public static function run2()
    {
        // set up conf
        self::setUp();
        $vmapper = new VenueMapper();

        $venue1 = new Venue(-1, "The Likey Lounge");
        $vmapper->insert($venue1);
        $venue1id = $venue1->getId();

        $venue2 = new Venue(-1, "The Hatey Lounge");
        $vmapper->insert($venue2);

        $collection = $vmapper->findAll();

        foreach ($collection as $venue) {
            print $venue->getName() . "\n";
        }
    }


    private static function setUp()
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
