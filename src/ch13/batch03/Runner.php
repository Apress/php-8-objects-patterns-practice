<?php

declare(strict_types=1);

namespace popp\ch13\batch03;

use popp\ch12\batch10\TableCreator;
use popp\ch12\batch06\Conf;
use popp\ch13\batch01\Registry;
use popp\ch13\batch01\Venue;

class Runner
{
    public static function run()
    {
        self::setUp();

// direct instantiation - otherwise we get the batch01

/* listing 13.20 */
        $mapper = new VenueMapper();

        $venue = new Venue(-1, "The Likey Lounge");
        $mapper->insert($venue);

        $venue1 = $mapper->find($venue->getId());
        $venue2 = $mapper->find($venue->getId());

        $venue1->setName("The Something Else");
        $venue2->setName("The Bibble Beer Likey Lounge");

        print $venue->getName() . "\n";
        print $venue1->getName() . "\n";
        print $venue2->getName() . "\n";
/* /listing 13.20 */
    }

    public static function run2()
    {
        self::setUp();

        // direct instantiation - otherwise we get the batch01
        $mapper = new VenueMapper();

        $venue = new Venue(-1, "The Likey Lounge");
        $mapper->insert($venue);
        $venue = $mapper->find($venue->getId());
        $venue->setName("The Bibble Beer Likey Lounge");

        // we haven't saved this yet.. what if we get the value
        // from elsewhere?
        $mapper2 = new VenueMapper();
        $venue2 = $mapper2->find($venue->getId());
        print $venue2->getName() . "\n";
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
