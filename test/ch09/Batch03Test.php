<?php
declare(strict_types=1);

namespace popp\ch09\batch03;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;
use popp\ch04\batch02\DbGenerate;

class Batch03Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        //print $val;
        $test = "mary: (I'll call my dad)|(I'll call my lawyer)|(I'll clear my desk)";
        self::assertMatchesRegularExpression("/$test/", $val);
        $test = "bob: (I'll call my dad)|(I'll call my lawyer)|(I'll clear my desk)";
        self::assertMatchesRegularExpression("/$test/", $val);
        $test = "harry: (I'll call my dad)|(I'll call my lawyer)|(I'll clear my desk)";
        self::assertMatchesRegularExpression("/$test/", $val);
    }

    function testShopProductGenerate()
    {
        $dbgen = new DbGenerate();
        $pdo = $dbgen->getPDO();

        $obj = ShopProduct::getInstance(1, $pdo);
        //print_r($obj);
        self::assertEquals("my antonia", $obj->getTitle());
        $obj = ShopProduct::getInstance(2, $pdo);
        //print_r($obj);
        self::assertEquals("london calling", $obj->getTitle());
        $obj = ShopProduct::getInstance(3, $pdo);
        //print_r($obj);
        self::assertEquals("soap", $obj->getTitle());
    }
}
