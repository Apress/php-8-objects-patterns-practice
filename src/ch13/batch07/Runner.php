<?php

declare(strict_types=1);

namespace popp\ch13\batch07;

use popp\ch12\batch06\AppException;
use popp\ch12\batch06\Conf;
use popp\ch12\batch10\TableCreator;
use popp\ch13\batch04\Venue;
use popp\ch13\batch04\Registry;

class Runner
{
    public static function run()
    {
/* listing 13.41 */
        $idobj = new IdentityObject();
        $idobj->field("name")
            ->eq("'The Good Show'")
            ->field("start")
            ->gt(time())
            ->lt(time() + (24 * 60 * 60));
/* /listing 13.41 */

        print $idobj;
    }

    public static function run2()
    {
/* listing 13.43 */
        try {
            $idobj = new EventIdentityObject();
            $idobj->field("banana")
                ->eq("The Good Show")
                ->field("start")
                ->gt(time())
                ->lt(time() + (24 * 60 * 60));

            print $idobj;
        } catch (\Exception $e) {
            print $e->getMessage();
        }
/* /listing 13.43 */
    }

    public static function run3()
    {
/* listing 13.46 */
        $vuf = new VenueUpdateFactory();
        print_r($vuf->newUpdate(new Venue(334, "The Happy Hairband")));
/* /listing 13.46 */
    }

    public static function run3_1()
    {
/* listing 13.47 */
        $vuf = new VenueUpdateFactory();
        print_r($vuf->newUpdate(new Venue(-1, "The Lonely Hat Hive")));
/* /listing 13.47 */
    }

    public static function run4()
    {
/* listing 13.50 */
        $vio = new VenueIdentityObject();
        $vio->field("name")->eq("The Happy Hairband");

        $vsf = new VenueSelectionFactory();
        print_r($vsf->newSelection($vio));
/* /listing 13.50 */
    }

    public static function run5()
    {
        self::setUp();

/* listing 13.52 */
        $factory = PersistenceFactory::getFactory(Venue::class);
        $finder = new DomainObjectAssembler($factory);
/* /listing 13.52 */

        $venue1 = new Venue(-1, "The Likey Lounge");
        $venue2 = new Venue(-1, "The Eyeball Inn");
        $venue3 = new Venue(-1, "The Eyeball Inn");
        $venue4 = new Venue(-1, "The Eyeball Inn");

        $finder->insert($venue1);
        $finder->insert($venue2);
        $finder->insert($venue3);
        $finder->insert($venue4);

/* listing 13.53 */
        $idobj = $factory->getIdentityObject()
            ->field('name')
            ->eq('The Eyeball Inn');

        $collection = $finder->find($idobj);

        foreach ($collection as $venue) {
            print $venue->getName() . "\n";
        }
/* /listing 13.53 */
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
        $pdo->query("INSERT INTO venue ( name ) VALUES ('bob')");
        $pdo->query("DROP TABLE  IF EXISTS space");
        $pdo->query("CREATE TABLE space ( id INTEGER PRIMARY KEY
            $autoincrement, venue INTEGER, name TEXT )");
        $pdo->query("DROP TABLE IF EXISTS event");
        $pdo->query("CREATE TABLE event ( id INTEGER PRIMARY KEY
            $autoincrement, space INTEGER, start long, duration int, name text )");
    }
}
