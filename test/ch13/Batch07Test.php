<?php
declare(strict_types=1);

namespace popp\ch13\batch07;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch07Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression("/^name = 'The Good Show' AND start > \d+ AND start < \d+/", $val);
        
        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals("banana not a legal field (name, id, start, duration, space)", $val);

        $val = $this->capture(function() { Runner::run3(); });
        self::assertMatchesRegularExpression("/UPDATE venue SET name = \? WHERE id = \?/", $val);
        self::assertMatchesRegularExpression("/The Happy Hairband/", $val);
        self::assertMatchesRegularExpression("/334/", $val);

        $val = $this->capture(function() { Runner::run3_1(); });
        self::assertMatchesRegularExpression("/The Lonely Hat Hive/", $val);

        $val = $this->capture(function() { Runner::run4(); });
        self::assertMatchesRegularExpression("/SELECT name,id FROM venue WHERE name = \?/", $val);
        self::assertMatchesRegularExpression("/The Happy Hairband/", $val);

        $val = $this->capture(function() { Runner::run5(); });
        $expected = "The Eyeball Inn\nThe Eyeball Inn\nThe Eyeball Inn\n";
        self::assertEquals($expected, $val);
    }
}
