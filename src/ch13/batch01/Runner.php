<?php

declare(strict_types=1);

namespace popp\ch13\batch01;

use popp\ch12\batch10\TableCreator;
use popp\ch12\batch06\Conf;

class Runner
{
    public static function run()
    {
        // set up conf
        self::setUp();
        $mapper = new VenueMapper();
        $venue = new Venue(-1, "The Likey Lounge");
        $mapper->insert($venue);
        $venue = new Venue(-1, "The Hatey Lounge");
        $mapper->insert($venue);

/* listing 13.04 */
        $mapper = new VenueMapper();
        $venue = $mapper->find(2);
        print_r($venue);
/* /listing 13.04 */
    }

    public static function run2()
    {
        // set up conf
        self::setUp();

/* listing 13.05 */
        $mapper = new VenueMapper();
        $venue = new Venue(-1, "The Likey Lounge");
        // add the object to the database
        $mapper->insert($venue);
        // find the object again – just to prove it works!
        $venue = $mapper->find($venue->getId());
        print_r($venue);
        // alter our object
        $venue->setName("The Bibble Beer Likey Lounge");
        // call update to enter the amended data
        $mapper->update($venue);
        // once again, go back to the database to prove it worked
        $venue = $mapper->find($venue->getId());
        print_r($venue);
/* /listing 13.05 */
    }

    public static function run3()
    {
        Registry::reset();

/* listing 13.09 */
        $reg = Registry::instance();

        $collection = $reg->getVenueCollection();
        $collection->add(new Venue(-1, "Loud and Thumping"));
        $collection->add(new Venue(-1, "Eeezy"));
        $collection->add(new Venue(-1, "Duck and Badger"));

        foreach ($collection as $venue) {
            print $venue->getName() . "\n";
        }
/* /listing 13.09 */
    }

    public static function run4()
    {
        Registry::reset();

/* listing 13.11 */
        $genvencoll = new GenVenueCollection();
        $genvencoll->add(new Venue(-1, "Loud and Thumping"));
        $genvencoll->add(new Venue(-1, "Eeezy"));
        $genvencoll->add(new Venue(-1, "Duck and Badger"));

        $gen = $genvencoll->getGenerator();

        foreach ($gen as $wrapper) {
            print_r($wrapper);
        }
/* /listing 13.11 */
    }

    public static function run5()
    {
        self::setUp();
        Registry::reset();
        $reg = Registry::instance();

        $venue = new Venue(-1, "Eeezy");
        $collection = $reg->getSpaceCollection();
        $collection->add(new Space(-1, "The big stage", $venue));

        $venue->setSpaces($collection);
        $venue->addSpace(new Space(-1, "The room downstairs"));

        $coll2 = $venue->getSpaces();
        foreach ($coll2 as $space) {
            print_r($space);
        }
    }

    private static function setUp()
    {
        $config = __DIR__ . "/data/woo_options.ini";
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

namespace popp\ch13\batch01\sub;

/* listing 13.02 */
abstract class Mapper
{
    public function __construct(protected \PDO $pdo)
    {
    }
}
/* /listing 13.02 */

class FakeMapper extends Mapper
{
}
