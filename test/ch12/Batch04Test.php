<?php
declare(strict_types=1);

namespace popp\ch12\batch04;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch04Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression("/TreeBuilder/", $val);
    }

    public function testRunner2()
    {
        $reg = Registry::instance();
        $reg2 = Registry::instance();

        $req = $reg2->getRequest();
        self::assertTrue($req instanceof Request);

        $tb = $reg2->treeBuilder();
        self::assertTrue($tb instanceof TreeBuilder);


        Registry::testMode();
        $mockreg = Registry::instance();
        self::assertTrue($mockreg instanceof MockRegistry);

        Registry::testMode(false);
        $reg4 = Registry::instance();
        self::assertFalse($reg4 instanceof MockRegistry);
        self::assertTrue($reg4 instanceof Registry);
    }
}
