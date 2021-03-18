<?php
declare(strict_types=1);

namespace popp\ch13\batch01;

// autoload won't help us here -- since Runner has a sneaky sub namespace
require_once(__DIR__."/../../src/ch13/batch01/Runner.php");
require_once("vendor/autoload.php");

use popp\test\BaseUnit;
use popp\ch13\batch01\sub\FakeMapper;

class Batch01Test extends BaseUnit 
{

    public function testVenueMapper()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression("/Venue Object/", $val);
        self::assertMatchesRegularExpression("/The Likey Lounge/", $val);
    } 

    public function testVenueMapper2()
    {

        $val = $this->capture(function() { Runner::run2(); });
        self::assertMatchesRegularExpression("/Venue Object/", $val);
        self::assertMatchesRegularExpression("/The Likey Lounge/", $val);
        self::assertMatchesRegularExpression("/The Bibble Beer Likey Lounge/", $val);

    }

    public function testIterator()
    {
        $val = $this->capture(function() { Runner::run3(); });
        $str = "Loud and Thumping\nEeezy\nDuck and Badger\n";
        self::assertEquals($str, $val);
    }

    public function testGenCollection()
    {
       
        $val = $this->capture(function() { Runner::run4(); });

        self::assertMatchesRegularExpression("/Loud and Thumping/", $val);
        self::assertMatchesRegularExpression("/Eeezy/", $val);
        self::assertMatchesRegularExpression("/Duck and Badger/", $val);
    }

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run5(); });
        self::assertMatchesRegularExpression("/The big stage/", $val);
        self::assertMatchesRegularExpression("/The room downstairs/", $val);
    }

    public function testFakeMapper()
    {
        $dsn = "sqlite:/var/popp/src/ch13/batch01/data/woo.db";
        $pdo = new \PDO($dsn);
        $mapper = new FakeMapper($pdo);
        self::assertTrue($mapper instanceof FakeMapper);
    }
}
