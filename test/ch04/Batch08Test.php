<?php
declare(strict_types=1);

namespace popp\ch04\batch08;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch08Test extends BaseUnit 
{

    public function testRunner()
    {

        $val = $this->capture(function() { Runner::run3(); });
        $expected = <<<EXPECTED
shoes: processing 
    mailing (shoes)

coffee: processing 
    mailing (coffee)

EXPECTED;
        self::assertEquals($expected, $val);
    }

    public function testRunnerTotalizer()
    {

        $val = $this->capture(function() { Runner::run4(); });
        $expected = <<<EXPECTED
shoes: processing 
    reached high price: 6

coffee: processing 
    reached high price: 6

EXPECTED;
        self::assertEquals($expected, $val);

    }

    public function testRunnerTotalizerClosure()
    {

        $val = $this->capture(function() { Runner::run5(); });
        $expected = <<<EXPECTED
shoes: processing 
   count: 6

coffee: processing 
   count: 12
   high price reached: 12

EXPECTED;
        self::assertEquals($expected, $val);
    }

    public function testRunnerTotalizerClosureFromCallable()
    {
        $val = $this->capture(function() { Runner::run6(); });
        $expected = <<<EXPECTED
shoes: processing 
   count: 6

coffee: processing 
   count: 12
   high price reached: 12

EXPECTED;
        self::assertEquals($expected, $val);

    }
    
    public function testRunnerArrowFunctionClosure()
    {
        $val = $this->capture(function() { Runner::run7(); });
        //print $val."\n";
        $expected = <<<EXPECTED
shoes: processing 
(shoes) marked up price: 9

coffee: processing 
(coffee) marked up price: 9

EXPECTED;
        self::assertEquals($expected, $val);
    }
}

