<?php
declare(strict_types=1);

namespace popp\ch05\batch07;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch07Test extends BaseUnit 
{

    public function testRunner()
    {
//        $val = $this->capture(function() { Runner::run(); });
//        print $val;

        $val = $this->capture(function() { Runner::run2(); });
        self::assertMatchesRegularExpression("/getInstance/", $val); 
        $val = $this->capture(function() { Runner::run3(); });

        self::assertMatchesRegularExpression("/producerFirstName/", $val);


        $val = $this->capture(function() { Runner::run4(); });
        $expected = <<<EXPECTED
popp\ch04\batch02\CdProduct is user defined
popp\ch04\batch02\CdProduct can be instantiated
popp\ch04\batch02\CdProduct can be cloned

EXPECTED;

        self::assertEquals($expected, $val);

        $val = $this->capture(function() { Runner::run5(); });
        self::assertMatchesRegularExpression("/getSummaryLine/", $val); 
        
        $val = $this->capture(function() { Runner::run6(); });
        self::assertMatchesRegularExpression("/getDiscount is user defined/", $val); 

        $val = $this->capture(function() { Runner::run7(); });
        self::assertMatchesRegularExpression("/public function getSummaryLine\(\): string/", $val); 

        $val = $this->capture(function() { Runner::run8(); });

        $rmethods = Runner::runInstantiateMethod();
        foreach ($rmethods as $rmethod) {
            self::assertTrue($rmethod instanceof \ReflectionMethod);
        }

        $rparams = Runner::runInstantiateParameter();
        foreach ($rparams as $rparam) {
            self::assertTrue($rparam instanceof \ReflectionParameter);
        }
    }
}
