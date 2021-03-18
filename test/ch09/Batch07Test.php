<?php
declare(strict_types=1);

namespace popp\ch09\batch07;

require_once("vendor/autoload.php");

use popp\test\BaseUnit;

class Batch07Test extends BaseUnit 
{

    public function testRunner()
    {
        $val = $this->capture(function() { Runner::run(); });
        $testout = <<<OUT
popp\\ch09\\batch07\\MegaApptEncoder
popp\\ch09\\batch07\\BloggsApptEncoder

OUT;
        self::assertEquals($val, $testout);
        
        $val = $this->capture(function() { Runner::run2(); });
        $testout = <<<OUT
MegaCal header
BloggsCal header

OUT;
        self::assertEquals($val, $testout);
    }
}
