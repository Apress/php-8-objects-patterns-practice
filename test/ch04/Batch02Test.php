<?php
declare(strict_types=1);

namespace popp\ch04\batch02;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch02Test extends BaseUnit 
{
    public function testProduct1() {
        $dbgen = new DbGenerate();
        $pdo = $dbgen->getPDO();

        $obj = ShopProduct::getInstance(1, $pdo);
        self::assertEquals($obj->getProducerFirstName(), "willa");
    }

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        self::assertMatchesRegularExpression("/\\[title:.*?soap/", $val);

        $val = $this->capture(function() { Runner::run2(); });
        self::assertEquals($val, "willa");
        
    }

    public function testRunnerConstant()
    {
        $val = $this->capture(function() { Runner::run3(); });
        self::assertEquals($val, 0);
        
    }

}
